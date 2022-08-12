<?php
/**
 * Plugin Name:       NACSL-MANAGER
 * Plugin URI:        https://github.com/cslrsna/NACSL-MANAGER-2
 * Description:       Gestionnaire de réunions, groupes, sous-comités et activités d'un CSL de Narcotiques Anonymes. 
 * Version:           2.0.1
 * Requires at least: 6.0.1
 * Requires PHP:      8.1
 * Author:            Bruno Pouliot
 * Author URI:        mailto://bruno@lecanardnoir.ca
 * License:           MIT
 * License URI:       https://choosealicense.com/licenses/mit/
 * Update URI:        https://github.com/cslrsna/NACSL-MANAGER-2
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
 * along with NACSL-MANAGER. If not, see https://github.com/cslrsna/NACSL-MANAGER-2/blob/main/LICENSE.
 */

if( ! defined('WPINC') ) die();
require 'vendor/autoload.php';

use NACSL\App;
use NACSL\Controllers\CptGroups;
use NACSL\Controllers\CptMeetings;
use NACSL\Controllers\CptSubCom;
use NACSL\Controllers\CptActivities;
use NACSL\Controllers\TaxJours;
use NACSL\Controllers\TaxTypes;
use NACSL\Services\CptService;
use NACSL\Services\StartupService;
use NACSL\Services\TaxService;
use NACSL\Utilities\AppConstants;
use Timber\Timber;

AppConstants::$__FILE__ = __file__;
AppConstants::$__DIR__ = __dir__;

AppConstants::$adminPath = __dir__ . "admin/";
AppConstants::$adminUrl = plugin_dir_url(__file__) . "admin/";        
AppConstants::$publicPath = __dir__ . "public/";
AppConstants::$publicUrl = plugin_dir_url(__file__) . "public/";        
AppConstants::$languagesPath = __dir__ . "languages/";
AppConstants::$languagesUrl = plugin_dir_url(__file__) . "languages/";

AppConstants::$basename = plugin_basename(__file__);

if( !function_exists('get_plugin_data') ){
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
AppConstants::$data = get_plugin_data(__file__);   
AppConstants::$version = AppConstants::$data['Version'];

Timber::$locations = __DIR__ . "/includes/Views";



StartupService::$colRegister = array(
    'CptGroups' => new CptGroups(new CptService()),
    'CptMeetings' => new CptMeetings(new CptService()),
    'CptSubCom' => new CptSubCom(new CptService()),
    'CptActivities' => new CptActivities(new CptService()),
    'TaxJours' => new TaxJours(new TaxService(), array('CptMeetings', 'CptActivities')),
    'TaxTypes' => new TaxTypes(new TaxService(), array('CptMeetings', 'CptActivities')),
);


register_activation_hook( __FILE__, [StartupService::class, 'Activate'] );
register_deactivation_hook( __FILE__, [StartupService::class, 'Deactivate'] );

StartupService::Init();

if( is_plugin_active(plugin_basename(__file__)) )
{
    $app = App::GetInstance();
    $app->Execute(StartupService::$colRegister);
}

//--------------------- FOR DEV ONLY

function NACSL_DEBUG($var){
    $file = __DIR__ . '/nacslDebug.json';
    file_put_contents($file, json_encode($var));
};