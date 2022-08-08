<?php
namespace NACSL\Controllers;

use NACSL\Services\Interfaces\ICptService;
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
        $this->optGroupSlug = $this->name . "_opt";
        $this->optNameJours = $this->optGroupSlug . "_jours";
    }

    public function AdminMenu(): void 
    {        
        add_submenu_page(
            "edit.php?post_type=" . $this->name, 
            "Options des meetings", 
            "Options", 
            "manage_options",
            $this->optGroupSlug,
            function(){
                echo '<div class="wrap">' . get_admin_page_title();
                echo "<form method='post' action='options.php'>";
                settings_fields($this->optGroupSlug);
                do_settings_fields($this->optGroupSlug, 'jours_section');
                do_settings_sections('jours_section');
                submit_button();
                echo "</form></div>";
            }, 
        );
    }

    public function Options(): void
    {
        //update_option($this->optNameJours, true);
        $option = get_option($this->optNameJours);
        $checked = $option ? 'checked' : '';
        //wp_die(var_export($option));
        register_setting(
            $this->optGroupSlug,
            $this->optNameJours
        );

        add_settings_section(
            'jours_section',
            'holyshit',
            function(){
                echo 'section';
            },
            $this->optGroupSlug
        );

        add_settings_field(
            $this->optNameJours,
            'Afficher taxonomy Jours',
            function() use ($option, $checked){
                echo "<input type='checkbox' $checked id='{$this->optNameJours}' name='{$this->optNameJours}' value='{$option}'>";
            },
            $this->optGroupSlug,
            'jours_section'
        );
    }

    public function AdminHook(): void
    {
        parent::AdminHook();
        add_action('admin_menu', [$this, 'AdminMenu']);
        add_action('admin_init', [$this, 'Options']);
    }
}