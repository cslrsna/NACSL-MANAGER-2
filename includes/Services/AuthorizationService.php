<?php
namespace NACSL\Services;

use NACSL\Utilities\AppConstants;

final class AuthorizationService
{
    /*
    update_plugins 
    install_plugins
    delete_plugins
    edit_plugins
    manage_options
    */

    const NOT_AUTHORIZED = "Vous ne possédez pas les autorisations nécessaires.";

    public static function ActivateDeactivatePluginsAllowed(string $action = null, string $nonce = null):void
    {   
        $nonce = ($action != null && $nonce != null) ? wp_verify_nonce($action, $nonce) : true;
        if( ! self::AdminCanDo('activate_plugins') && !$nonce) 
            exit(__(self::NOT_AUTHORIZED, AppConstants::TEXT_DOMAIN));
    }

    public static function UninstallPluginsAllowed(string $action, string $nonce):void
    {        
        if( !self::AdminCanDo('delete_plugins') && check_ajax_referer($action, $nonce)) 
            exit(__(self::NOT_AUTHORIZED, AppConstants::TEXT_DOMAIN));
    }

    public static function AdminCanManageOption()
    {
        if( !self::AdminCanDo('manage_option')) 
            exit(__(self::NOT_AUTHORIZED, AppConstants::TEXT_DOMAIN));
    }

    private static function AdminCanDo(string $cap):bool
    {
        $user = wp_get_current_user();
        $roles = $user->roles;
        return  defined( 'WP_ADMIN' ) 
                && is_admin()
                && in_array('administrator', $roles)
                && current_user_can($cap);
    }
}
