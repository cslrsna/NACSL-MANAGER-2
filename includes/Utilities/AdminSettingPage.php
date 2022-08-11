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
    public EnumSettingFieldInputType $fieldinputType;
    public EnumSettingFieldType $fieldType;
    
    public string $option_group;
    public array $fields;
    public array $sections;

    /**
     * Instancing the setting page.
     * @param string $option_group [Slug page]
     * @return void 
     */
    public function __construct(string $option_group)
    {
        $this->option_group = $option_group;
        $this->sections = array();
        $this->fields = array();
    }

    /**
     * Add section to setting page
     * @param string $suffixId Section id:  _$this->option_group . "\_section\_" ._ __$SuffixId__
     * @param string $title Section title
     * @return void 
     */
    public function AddSection(string $suffixId, string $title):void
    {
        $this->sections[] = array(
            'id' => $this->option_group . "_section_" . $suffixId,
            'title' => $title         
        );
    }

    /**
     * Add field into section
     * @param string $id field id
     * @param string $title Field title
     * @param EnumSettingFieldInputType $inputType
     * @param string $section Section id
     * @param array $attr additionnal HTML attributes [key => val]
     * @param EnumSettingFieldType $type 
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
        $this->fields[] = array(
            'id' => $id,
            'title' => $title,
            'inputType' => $inputType,
            'section' => $this->option_group . "_section_" . $section,
            'attr' => $attr,
            'args' => $this->SelectSanitizer($type)
        );
    }

    /**
     * Setting page builder
     */
    public function Factory():void
    {
        $page = $this->option_group;
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

        foreach ($this->fields as $field) {
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
        $this->LoadFormScript();
    }

    private function LoadFormScript():void
    {

        if( isset($_REQUEST['page']) && str_contains($_REQUEST['page'], AppConstants::PREFIX) && str_contains($_REQUEST['page'], "_opt") )
        {
            add_action('admin_enqueue_scripts', function(){
                $admin = AppConstants::PREFIX . 'admin_form';
                $url = AppConstants::$adminUrl;
    
                wp_register_script(
                    $admin,
                    "$url/js/$admin.js",
                    array(),
                    false,
                    true
                );
                wp_enqueue_script($admin);
            });
        }
    }

    /**
     * HTML input selector
     * @param EnumSettingFieldInputType $inputType 
     * @param string $id input id
     * @param mixed $option input value
     * @param array|null $attr input attribute
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
                    'type' => EnumSettingFieldType::BOOLEAN->value,
                    'sanitize_callback' => fn($val) => rest_sanitize_boolean(filter_var(esc_attr($val),FILTER_VALIDATE_BOOL,FILTER_NULL_ON_FAILURE))
                ];
                break;
            case EnumSettingFieldType::STRING:
                return [
                    'type' => EnumSettingFieldType::STRING->value,
                    'sanitize_callback' => fn($val) => filter_var(esc_attr($val), FILTER_SANITIZE_FULL_SPECIAL_CHARS)
                ];
                break;
            
            default:
                return array();
                break;
        }
    }
}
