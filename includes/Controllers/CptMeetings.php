<?php
namespace NACSL\Controllers;

/**
 * Custom post type controller for the Area service committees meetings.
 * @package NACSL\Controllers
 */
class CptMeetings extends CustomPostType
{

    public function AdminMenu(): void 
    { 
        parent::AdminMenu();
        
        add_submenu_page(
            "edit.php?post_type=nacsl_cptmeetings", 
            "Calendrier des réunion", 
            "Calendrier", 
            "manage_options",
            "test",
            function(){
                echo "<h1>" . get_admin_page_title() . "</h1>";
            }
        );
    }
}