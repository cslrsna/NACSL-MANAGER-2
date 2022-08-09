<?php

namespace NACSL\Utilities;

use NACSL\Utilities\Interfaces\IAdminSettingPageFactory;
use Timber\Timber;

enum EnumSettingFieldType
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
 * Add setting page
 * @method __construct(string $option_group) [param: Slug page]
 * @package NACSL\Utilities
 */
class AdminSettingPageFactory implements IAdminSettingPageFactory
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
    }

    /**
     * Add field to a section
     * @param string $id 
     * @param string $title 
     * @param string $type 
     * @param string $section 
     * @return void 
     */
    public function AddField( string $id, string $title, EnumSettingFieldType $type, string $section='default', array $attr = null, array $args=array()):void
    {
        $this->optFields[] = array(
            'id' => $id,
            'title' => $title,
            'type' => $type,
            'section' => $section,
            'attr' => $attr,
            'args' => $args
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

    public function BuildPage():void
    {
        $page = $this->optGroupSlug;
        foreach ($this->sections as $section) {            
            add_settings_section(
                $section['id'],
                $section['title'],
                '', // View
                $page
            );
        }
        foreach ($this->optFields as $field) {
            $type = $field['type'];
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
                function() use ($type, $id, $option){
                    $this->SelectInputView($type, $id, $option);
                },
                $page,
                $section
            );
        }
    }

    public function SelectInputView(EnumSettingFieldType $type, string $id, $option, array $attr = null):void
    {
        $typeFile = ucfirst(strtolower($type->name));
        switch ($type) {
            case EnumSettingFieldType::CHECKBOX:
                $data = array(
                    'inputChecked' => $option ? 'checked' : '',
                    'optField' => $id,
                    'option' => $option                      
                );
                break;
            
            default:
                # code...
                break;
        }
        Timber::render("admin/form/_input{$typeFile}Partial.twig", $data);
    }
}
