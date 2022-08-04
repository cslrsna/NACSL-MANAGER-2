<?php
namespace NACSL\Services;

use NACSL\Utilities\AppConstants;

final class SetupService
{
    public static function Activate():void
    {
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

    public static function Uninstall()
    {
        AuthorizationService::UninstallPluginsAllowed($_REQUEST['action'], $_REQUEST['_ajax_nonce']);
        delete_option(AppConstants::OPT_ACTIVATED);
        delete_option(AppConstants::OPT_VERSION);
    }
}
