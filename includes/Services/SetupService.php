<?php
namespace NACSL\Services;

use NACSL\Utilities\AppConstants;
use NACSL\Utilities\Config;

final class SetupService
{
    public static function Activate():void
    {
        self::CheckDependencies();
        AuthorizationService::ActivateDeactivatePluginsAllowed();
        add_option(AppConstants::OPT_ACTIVATED, false);
        if( !get_option(AppConstants::OPT_VERSION))
            add_option(AppConstants::OPT_VERSION, AppConstants::$data['Version']);

        //foreach ( $cptList as $cpt) $cpt->Register();
        flush_rewrite_rules();
    }

    public static function Deactivate():void
    {
        AuthorizationService::ActivateDeactivatePluginsAllowed($_REQUEST['action'], $_REQUEST['_wpnonce']);
        update_option(AppConstants::OPT_ACTIVATED, false);
        //foreach ( $cptList as $cpt) $cpt->Unregister();
        flush_rewrite_rules();
    }

    public static function Uninstall():void
    {
        AuthorizationService::UninstallPluginsAllowed($_REQUEST['action'], $_REQUEST['_ajax_nonce']);
        delete_option(AppConstants::OPT_ACTIVATED);
        delete_option(AppConstants::OPT_VERSION);
    }

    public static function CheckDependencies():void
    {
        $requireDep = array();
        foreach (Config::$dependencies as $plugin => $basename) {
            if( ! is_plugin_active($basename) )
            {
                $requireDep[] = $plugin;
            }
        }
        if( count($requireDep) > 0 ) exit( __("<strong>NACSL-MANAGER:</strong> Certaines dépendances sont manquantes. Veuillez installer et activer ces extensions avant d'activer le gestionnaire de réunions de Narcotiques Anonymes. <hr><b>Liste des extensions manquantes:</b> <i>", AppConstants::TEXT_DOMAIN) . join(' ,', $requireDep) . "</i>" );
    }
}
