<?php
namespace NACSL\Controllers;

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
    public IAdminSettingPage $optGroup;

    public function __construct(ICptService $cptServ)
    {
        parent::__construct($cptServ);
        $this->optGroupSlug = $this->slug . "_opt";
        $this->optNameJours = $this->optGroupSlug . "_taxjours";
    }


    /**
     * All unregister logic for all costom post type
     * @return void 
     */
    public function Unregister(): void 
    { 
        parent::Unregister();
        unregister_setting($this->optGroupSlug, $this->optNameJours);
    }

    public function AdminMenu(): void 
    {   
        $slug = $this->slug;
        $optGroupSlug = $this->optGroupSlug;
        $title = $this->model->labels->name;
        $option = get_option($this->optNameJours);
        $taxonomies = get_object_taxonomies($slug);

        add_submenu_page(
            "edit.php?post_type=" . $slug, 
            "Options des " . $title, 
            "Options", 
            "manage_options",
            $optGroupSlug,
            function() use($optGroupSlug){
                Timber::render('admin/form/AdminOptionsForm.twig', ['optGroupSlug'=> $optGroupSlug]);                
            }
        );     
        
        foreach ($taxonomies as $tax) {
            if( str_contains(strtolower($tax), 'taxjours') && ! $option ){
                remove_submenu_page("edit.php?post_type=$slug", "edit-tags.php?taxonomy=$tax&amp;post_type=$slug");
            }
        }
    }

    public function Options(): void
    {
        $optSection = 'nacsl_default_opt_section';
        $this->optGroup = new AdminSettingPage($this->optGroupSlug);
        $this->optGroup->AddSection($optSection, 'Taxonomy Jours');
        $this->optGroup->AddField(
            id:$this->optNameJours, 
            title:'Afficher le sous-menu', 
            section:$optSection,
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