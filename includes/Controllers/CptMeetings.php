<?php
namespace NACSL\Controllers;

use NACSL\Services\CptMeetingsService;
use NACSL\Services\Interfaces\ICptService;
use NACSL\Utilities\AdminSettingPage;
use NACSL\Utilities\EnumSettingFieldInputType;
use NACSL\Utilities\EnumSettingFieldType;
use NACSL\Utilities\Interfaces\IAdminSettingPage;
use Timber\Timber;

/**
 * Custom post type controller for the Area service committees meetings.
 * @package NACSL\Controllers
 */
class CptMeetings extends CustomPostType
{
    public string $optGroupSlug;
    public string $optNameJours;
    public string $optNameTypes;
    public IAdminSettingPage $optGroup;
    private CptMeetingsService $_thisServ;

    public function __construct(ICptService $cptServ)
    {
        parent::__construct($cptServ);
        $this->_thisServ = new CptMeetingsService();
        $this->optGroupSlug = $this->slug . "_opt";
        $this->optNameJours = $this->optGroupSlug . "_taxjours";
        $this->optNameTypes = $this->optGroupSlug . "_taxtypes";
    }


    /**
     * All unregister logic for all costom post type
     * @return void 
     */
    public function Unregister(): void 
    { 
        parent::Unregister();
        unregister_setting($this->optGroupSlug, $this->optNameJours);
        unregister_setting($this->optGroupSlug, $this->optNameTypes);
    }

    public function AdminMenu(): void 
    {   
        $this->_thisServ->GetOptionsMenu(
            $this->slug, 
            $this->model->labels->name, 
            $this->optGroupSlug, 
            array('jours' => $this->optNameJours, 'types' => $this->optNameTypes),
            array('optGroupSlug'=> $this->optGroupSlug)
        );
    }

    public function Options(): void
    {
        $this->optGroup = new AdminSettingPage($this->optGroupSlug);

        $optSectionJours = 'nacsl_opt_section_jours';
        $this->optGroup->AddSection($optSectionJours, "Catégorie: Jours");
        $this->optGroup->AddField(
            id:$this->optNameJours, 
            title:"Afficher le sous-menu", 
            section:$optSectionJours,
            inputType:EnumSettingFieldInputType::CHECKBOX,
            type: EnumSettingFieldType::BOOLEAN
        );

        $optSectionTypes = 'nacsl_opt_section_types';
        $this->optGroup->AddSection($optSectionTypes, "Catégorie: Types des réunions");
        $this->optGroup->AddField(
            id:$this->optNameTypes, 
            title:"Afficher le sous-menu", 
            section:$optSectionTypes,
            inputType:EnumSettingFieldInputType::CHECKBOX,
            type: EnumSettingFieldType::BOOLEAN
        );

        $this->optGroup->Factory(); 
    }

    public function AdminHook(): void
    {
        parent::AdminHook();
        add_action('admin_menu', [$this, 'AdminMenu']);
        add_action('admin_init', [$this, 'Options']);
    }
}