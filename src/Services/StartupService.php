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
     * Init action
     * @return void 
     */
    public static function Init():void
    {
        self::LoadAssets();
        self::Dependencies();
        self::Update();
        self::IsInstall();
    }

    /**
     * Collection of startup register objects 
     * @var array
     */
    public static array $colRegister = array();
    
    /**
     * Activate NACSL-MANAGER
     * @return void 
     */
    public static function Activate():void
    {
        AuthorizationService::ActivateDeactivatePluginsAllowed();
        if( !get_option(AppConstants::OPT_VERSION))
            update_option(AppConstants::OPT_VERSION, AppConstants::$data['Version']);

        foreach (self::$colRegister as $obj) {
            $obj->Register();
        }       

        flush_rewrite_rules();
        update_option(AppConstants::OPT_ACTIVATED,true);
    }
    
    /**
     * Deactivate NACSL-MANAGER
     * @return void 
     */
    public static function Deactivate():void
    {
        if(isset($_REQUEST['action']))
            AuthorizationService::ActivateDeactivatePluginsAllowed($_REQUEST['action'], $_REQUEST['_wpnonce']);

        update_option(AppConstants::OPT_ACTIVATED, false);

        foreach (self::$colRegister as $obj) {
            $obj->Unregister();
        }

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
        //global $wpdb;
        //$wpdb->delete($wpdb->posts, array( 'post_type' => 'nacsl_cptgroups' ));
    }
    /**
     * Check if NACSL-MANAGER is installed correctly. Show admin notice just one time.
     * @return void 
     */
    public static function IsInstall():void
    {
        if( get_option(AppConstants::OPT_ACTIVATED) )
        {
            new AdminNotice(EnumAdminNoticeType::SUCCESS,__("Installation",AppConstants::TEXT_DOMAIN),__("L'extension s'est installé correctement.", AppConstants::TEXT_DOMAIN));
            delete_option(AppConstants::OPT_ACTIVATED);
        }
    }

    /**
     * Check dependencies and deactivate plugin if is missing some dependencies.
     * @return void 
     */
    public static function Dependencies():void
    {
        validate_plugin_requirements(AppConstants::$basename);
        $requireDep = array();
        foreach (Config::$dependencies as $plugin => $basename) {
            if( ! is_plugin_active($basename) )
            {
                $requireDep[] = $plugin;
            }
        }
        if( count($requireDep) > 0 ) 
        {       
            new AdminNotice(
                EnumAdminNoticeType::ERROR,
                __("Dépendances",AppConstants::TEXT_DOMAIN),
                __("</strong> Certaines dépendances sont manquantes. Veuillez installer et activer ces extensions avant d'activer le gestionnaire de réunions de Narcotiques Anonymes. <hr><b>Liste des extensions manquantes:</b><br><i>", AppConstants::TEXT_DOMAIN) . join(' ,', $requireDep) . "</i>"
            );
            deactivate_plugins(AppConstants::$basename);
            update_option(AppConstants::OPT_ACTIVATED, false); 
        }
    }

    /**
     * For future update if some stuff need to be done this will be the place to write update logic. Show admin notice if an update has been done.
     * @return void 
     */
    public static function Update():void
    {
        $oldVer = get_option(AppConstants::OPT_VERSION);
        $newVer = AppConstants::$version;
        if($oldVer != $newVer)
        {
            // Do update stuff here

            // stop updating
            update_option(AppConstants::OPT_VERSION, $newVer);
            new AdminNotice(
                EnumAdminNoticeType::SUCCESS,
                __("Mise à jour",AppConstants::TEXT_DOMAIN),
                __("L'extension est passée de la version <b>$oldVer</b> à la version <b>$newVer</b> correctement.", AppConstants::TEXT_DOMAIN)
            );
            delete_option(AppConstants::OPT_ACTIVATED);
            flush_rewrite_rules();
        }
    }

    /**
     * Load admin or public assets
     * @return void 
     */
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
