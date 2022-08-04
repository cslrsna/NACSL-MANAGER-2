<?php
/**
 * Plugin Name:       NACSL MANAGER
 * Plugin URI:        https://github.com/cslrsna/NACSL-MANAGER
 * Description:       Gestionnaire de réunions, groupes, sous-comités et activités d'un CSL de Narcotiques Anonymes. 
 * Version:           2.0
 * Requires at least: 6.0.1
 * Requires PHP:      8.1
 * Author:            Bruno Pouliot
 * Author URI:        mailto://bruno@lecanardnoir.ca
 * License:           MIT
 * License URI:       https://choosealicense.com/licenses/mit/
 * Update URI:        https://github.com/cslrsna/NACSL-MANAGER
 * Text Domain:       nacsl_domain
 * Domain Path:       src/Languages
 */

if( ! defined('WPINC') ) die();
require 'vendor/autoload.php';

use NACSL\Services\SetupService;
use NACSL\Utilities\AppConstants;

AppConstants::Hydrate(__FILE__, __DIR__);

register_activation_hook( __FILE__, [SetupService::class, 'Activate'] );
register_deactivation_hook( __FILE__, [SetupService::class, 'Deactivate'] );