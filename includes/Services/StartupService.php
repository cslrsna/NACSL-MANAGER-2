<?php
namespace NACSL\Services;

use NACSL\Utilities\AdminNotice;
use NACSL\Utilities\AppConstants;
use NACSL\Utilities\Config;
use NACSL\Utilities\EnumAdminNoticeType;

/**
 * NACSL-MANAGER startup
 * @package NACSL\Services
 */
final class StartupService
{
    /**
     * Activate NACSL-MANAGER
     * @return void 
     */
    public static function Activate():void
    {
        AuthorizationService::ActivateDeactivatePluginsAllowed();
        if( !get_option(AppConstants::OPT_VERSION))
            update_option(AppConstants::OPT_VERSION, AppConstants::$data['Version']);
        //foreach ( $cptList as $cpt) $cpt->Register();
        flush_rewrite_rules();
        update_option(AppConstants::OPT_ACTIVATED,self::Dependencies());
    }
    
    /**
     * Deactivate NACSL-MANAGER
     * @return void 
     */
    public static function Deactivate():void
    {
        AuthorizationService::ActivateDeactivatePluginsAllowed($_REQUEST['action'], $_REQUEST['_wpnonce']);
        update_option(AppConstants::OPT_ACTIVATED, false);
        //foreach ( $cptList as $cpt) $cpt->Unregister();
        flush_rewrite_rules();
    }

    /**
     * Uninstall NACSL-MANAGER
     * @return void 
     */
    public static function Uninstall():void
    {
        AuthorizationService::UninstallPluginsAllowed($_REQUEST['action'], $_REQUEST['_ajax_nonce']);
        delete_option(AppConstants::OPT_ACTIVATED);
        delete_option(AppConstants::OPT_VERSION);
    }
    /**
     * Check if NACSL-MANAGER is installed correctly. Show admin notice just one time.
     */
    public static function IsInstall()
    {
        if( get_option(AppConstants::OPT_ACTIVATED) )
        {
            new AdminNotice(EnumAdminNoticeType::SUCCESS,__("Installation",AppConstants::TEXT_DOMAIN),__("L'extension s'est installé correctement.", AppConstants::TEXT_DOMAIN));
            delete_option(AppConstants::OPT_ACTIVATED);
        }
    }

    public static function Dependencies():bool
    {
        $requireDep = array();
        foreach (Config::$dependencies as $plugin => $basename) {
            if( ! is_plugin_active($basename) )
            {
                $requireDep[] = $plugin;
            }
        }
        if( count($requireDep) > 0 ) 
        {
            deactivate_plugins(AppConstants::$basename, true);
            update_option(AppConstants::OPT_ACTIVATED, false);
            flush_rewrite_rules();          
            new AdminNotice(EnumAdminNoticeType::ERROR,__("Dépendances",AppConstants::TEXT_DOMAIN),__("</strong> Certaines dépendances sont manquantes. Veuillez installer et activer ces extensions avant d'activer le gestionnaire de réunions de Narcotiques Anonymes. <hr><b>Liste des extensions manquantes:</b><br><i>", AppConstants::TEXT_DOMAIN) . join(' ,', $requireDep) . "</i>");
            return false;
        }
        return true;
    }
    public static function Update():void
    {
        $oldVer = get_option(AppConstants::OPT_VERSION);
        $newVer = AppConstants::$version;
        if($oldVer != $newVer)
        {
            // Do update stuff here

            // stop updating
            update_option(AppConstants::OPT_VERSION, $newVer);
            new AdminNotice(EnumAdminNoticeType::SUCCESS,__("Mise à jour",AppConstants::TEXT_DOMAIN),__("L'extension est passée de la version <b>$oldVer</b> à la version <b>$newVer</b> correctement.", AppConstants::TEXT_DOMAIN));
            delete_option(AppConstants::OPT_ACTIVATED);
            flush_rewrite_rules();
        }
    }

    public static function LoadAssets():void
    {        
        add_action('admin_enqueue_scripts', function(){
            $admin = AppConstants::PREFIX . 'admin';
            $url = AppConstants::$adminUrl;
            wp_register_style(
                $admin,
                "$url/css/$admin.css",
                array(),
                false,
                'all'
            );
            wp_enqueue_style( $admin );

            wp_register_script(
                $admin,
                "$url/js/$admin.js",
                array(),
                false,
                true
            );
            wp_enqueue_script($admin);
        });

        
        add_action('wp_enqueue_scripts', function(){
            $public = AppConstants::PREFIX . 'public';
            $url = AppConstants::$publicUrl;
            wp_register_style(
                $public,
                "$url/css/$public.css",
                array(),
                false,
                'all'
            );
            wp_enqueue_style( $public );

            wp_register_script(
                $public,
                "$url/js/$public.js",
                array(),
                false,
                true
            );
            wp_enqueue_script($public);
        });
    }
}
