<?php
/**
 * Plugin Name:       NACSL-MANAGER
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
 * 
 * NACSL-MANAGER is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *  
 * NACSL-MANAGER is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *  
 * You should have received a copy of the GNU General Public License
 * along with NACSL-MANAGER. If not, see {URI to Plugin License}.
 */

if( ! defined('WPINC') ) die();
require 'vendor/autoload.php';

use NACSL\Services\SetupService;
use NACSL\Utilities\AppConstants;

AppConstants::Hydrate(__FILE__, __DIR__);

register_activation_hook( __FILE__, [SetupService::class, 'Activate'] );
register_deactivation_hook( __FILE__, [SetupService::class, 'Deactivate'] );