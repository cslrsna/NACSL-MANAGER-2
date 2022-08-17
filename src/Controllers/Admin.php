<?php
namespace NACSL\Controllers;

use NACSL\Controllers\Interfaces\IAdminController;

class Admin implements IAdminController
{

    public function RoleSettings(): void 
    {
        $usr = wp_get_current_user();
        if($usr->roles[0] = 'membre'){
            remove_meta_box('dashboard_primary','dashboard','side' );
            remove_meta_box('dashboard_activity','dashboard','normal');
            //remove_meta_box('dashboard_incoming_links','dashboard','normal' );
            //remove_meta_box('dashboard_plugins','dashboard','normal' );
            //remove_meta_box('dashboard_secondary','dashboard','normal' );
            //remove_meta_box('dashboard_quick_press','dashboard','side' );
            //remove_meta_box('dashboard_recent_drafts','dashboard','side' );
            //remove_meta_box('dashboard_recent_comments','dashboard','normal' );
            //remove_meta_box('dashboard_right_now','dashboard','normal' );
        }
    }

    public function AdminMenu(): void { }

    public function AdminHook(): void 
    {
        add_action('wp_dashboard_setup', [$this,'RoleSettings']);
    }
    
}
