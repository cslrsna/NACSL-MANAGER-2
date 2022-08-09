<?php
namespace NACSL\Controllers;

use NACSL\Services\Interfaces\ICptService;
use NACSL\Utilities\AdminSettingPageFactory;
use NACSL\Utilities\EnumSettingFieldType;
use Timber\Timber;

/**
 * Custom post type controller for the Area service committees meetings.
 * @package NACSL\Controllers
 */
class CptMeetings extends CustomPostType
{
    public string $optGroupSlug;
    public string $optNameJours;

    public function __construct(ICptService $cptServ)
    {
        parent::__construct($cptServ);
        $this->optGroupSlug = $this->slug . "_opt";
        $this->optNameJours = $this->optGroupSlug . "_taxjours";
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
        $section = 'nacsl_default_opt_section';
        $optGroup = new AdminSettingPageFactory($this->optGroupSlug);
        $optGroup->AddSection($section, 'Taxonomy Jours');
        $optGroup->AddField(
            id:$this->optNameJours, 
            title:'Afficher le sous-menu', 
            type:EnumSettingFieldType::CHECKBOX,
            section:$section,
            args: [
                'type' => 'boolean',
                'sanitize_callback' => fn($val) => filter_var($val,FILTER_VALIDATE_BOOL,FILTER_NULL_ON_FAILURE)
            ]
        );
        $optGroup->BuildPage(); 
    }

    public function AdminHook(): void
    {
        parent::AdminHook();
        add_action('admin_menu', [$this, 'AdminMenu']);
        add_action('admin_init', [$this, 'Options']);
    }
}