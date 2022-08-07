<?php
namespace NACSL\Controllers;

use NACSL\Services\ICptService;

class CptMeetings extends CustomPostType
{
    public function __construct(ICptService $cptServ)
    {
        parent::__construct($cptServ);
    }

    public function Unregister(): void 
    { 
        unregister_post_type($this->model->name);
    }
    
    public function Register(): void 
    {
        //wp_die(print_r($this->model));
        register_post_type($this->model->name, $this->model->ToArray());
    }

    public function AdminMenu(): void 
    { 
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

    public function Options(): void 
    { 

    }

    public function Hook(): void 
    { 
        add_action('init', [$this, 'Register']);
    }

    public function AdminHook(): void 
    {
        //add_action('admin_menu', [$this, 'AdminMenu']); 
    }

    public function PublicHook(): void { }
}