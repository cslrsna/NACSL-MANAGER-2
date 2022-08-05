<?php

use NACSL\Services\AuthorizationService;
use NACSL\Services\StartupService;
use NACSL\Utilities\AppConstants;

require 'vendor/autoload.php';

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit;

StartupService::Uninstall();

// TODO: remove this below
exit('NACSL is uninstalled');