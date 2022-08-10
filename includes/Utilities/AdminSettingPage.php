<?php

namespace NACSL\Utilities;

use NACSL\Utilities\Interfaces\IAdminSettingPage;
use Timber\Timber;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * HTML input type
 */
enum EnumSettingFieldInputType
{
    case CHECKBOX;
    case COLOR;
    case DATE;
    case DATETIME_LOCAL;
    case EMAIL;
    case HIDDEN;
    case MONTH;
    case NUMBER;
    case PASSWORD;
    case RADIO;
    case RANGE;
    case TEXT;
    case TEL;
    case TIME;
    case URL;
    case WEEK;
    case TEXTAREA;
}

/**
 * Type of return value
 */
enum EnumSettingFieldType:string
{
    //'string', 'boolean', 'integer', 'number', 'array', and 'object'.
    case STRING = 'string';
    case BOOLEAN = 'boolean';
    case INTERGER = 'integer';
    case NUMBER = 'number';
    case ARRAY = 'array';
    case OBJECT = 'object';
    case DEFAULT = 'default';
}
/**
 * Add setting page
 * @package NACSL\Utilities
 */
class AdminSettingPage implements IAdminSettingPage
{
    public string $optGroupSlug;
    public array $optFields;
    public array $sections;

    /**
     * Instancing the setting page.
     * @param string $option_group [Slug page]
     * @return void 
     */
    public function __construct(string $option_group)
    {
        $this->optGroupSlug = $option_group;
        $this->sections = array();
    }

    /**
     * Add field to a section
     * @param string $id 
     * @param string $title 
     * @param string $inputType 
     * @param string $section 
     * @return void 
     */
    public function AddField( 
        string $id, 
        string $title, 
        EnumSettingFieldInputType $inputType = EnumSettingFieldInputType::TEXT, 
        string $section='default', 
        array $attr = array(), 
        EnumSettingFieldType $type = EnumSettingFieldType::DEFAULT
    ):void
    {
        $this->optFields[] = array(
            'id' => $id,
            'title' => $title,
            'inputType' => $inputType,
            'section' => $section,
            'attr' => $attr,
            'args' => $this->SelectSanitizer($type)
        );
    }

    /**
     * Add section to setting page
     * @param string $id 
     * @param string $title 
     * @return void 
     */
    public function AddSection(string $id, string $title):void
    {
        $this->sections[] = array(
            'id' => $id,
            'title' => $title         
        );
    }

    /**
     * Admin page builder
     */
    public function Factory():void
    {
        $page = $this->optGroupSlug;
        if( count($this->sections) > 0 ):
            foreach ($this->sections as $section) {            
                add_settings_section(
                    $section['id'],
                    $section['title'],
                    '', // View
                    $page
                );
            }
        else:                        
            add_settings_section(
                'default',
                '',
                '', // View
                $page
            );
        endif;

        foreach ($this->optFields as $field) {
            $inputType = $field['inputType'];
            $id = $field['id'];
            $title = $field['title'];
            $section = $field['section'];
            $option = get_option($id);
            $args = $field['args'];

            register_setting(
                $page,
                $id,
                $args
            );

            add_settings_field(
                $id,
                $title,
                function() use ($inputType, $id, $option){
                    $this->SelectInputView($inputType, $id, $option);
                },
                $page,
                $section
            );
        }
    }

    /**
     * HTML input selector
     * @param EnumSettingFieldInputType $inputType 
     * @param string $id 
     * @param mixed $option 
     * @param array|null $attr 
     * @return void 
     * @throws LoaderError 
     * @throws LoaderError 
     * @throws RuntimeError 
     * @throws RuntimeError 
     * @throws SyntaxError 
     * @throws SyntaxError 
     */
    private function SelectInputView(EnumSettingFieldInputType $inputType, string $id, $option, array $attr = null):void
    {
        $typeFile = ucfirst(strtolower($inputType->name));
        switch ($inputType) {
            case EnumSettingFieldInputType::CHECKBOX:
                $data = array(
                    'inputChecked' => $option ? 'checked' : '',
                    'optField' => $id,
                    'option' => $option                      
                );
                break;
            case EnumSettingFieldInputType::TEXT:
                $typeFile = 'Default';
                $data = array(
                    'type' => 'text',
                    'optField' => $id,
                    'option' => $option                      
                );
                break;
            
            default:                
                $typeFile = 'Default';
                $data = array(
                    'type' => 'text',
                    'optField' => $id,
                    'option' => $option                      
                );
                break;
        }
        Timber::render("admin/form/_input{$typeFile}Partial.twig", $data);
    }

    /**
     * Custom sanitizer by input type return
     * @param EnumSettingFieldType $type 
     * @return mixed 
     */
    private function SelectSanitizer(EnumSettingFieldType $type):mixed
    {        
        switch ($type) {
            case EnumSettingFieldType::BOOLEAN:
                return [
                    'type' => 'boolean',
                    'sanitize_callback' => fn($val) => filter_var($val,FILTER_VALIDATE_BOOL,FILTER_NULL_ON_FAILURE)
                ];
                break;
            
            default:
                return array();
                break;
        }
    }
}
