<?php
namespace NACSL\Controllers;

use NACSL\Services\Interfaces\ICptService;
use NACSL\Utilities\AdminSettingFactory;
use NACSL\Utilities\EnumSettingFieldInputType;
use NACSL\Utilities\EnumSettingFieldType;

/**
 * Custom post type controller for the Area service committees groups.
 * @package NACSL\Controllers
 */
class CptGroups extends CustomPostType
{

    public function __construct(ICptService $cptServ)
    {
        parent::__construct($cptServ);
        //$this->hasOptions = true;
    }

    public function AddOptionTest()
    {
        /* $option_group = $this->model->option_group;
        $optGroup = new AdminSettingPage($option_group );

        $sectionDefault = $option_group  . "_section_test";        
        $optGroup->AddSection($sectionDefault, "Test d'ajout de section");
         
        $optGroup->AddField(
            id: $option_group . "_add_option_test",
            title:  "Mon animal favorie", 
            section:$sectionDefault,
            inputType:EnumSettingFieldInputType::TEXT,
            type: EnumSettingFieldType::STRING
        );

        $optGroup->Factory();  */        
    }

    public function AdminHook(): void
    {
        parent::AdminHook();

        /* if($this->hasOptions)
        {
            add_action('admin_init', [$this, 'AddOptionTest']);
        } */
    }
}
