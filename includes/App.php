<?php
namespace NACSL;

use NACSL\Controllers\AdminMain;
use NACSL\Controllers\CptGroups;
use NACSL\Controllers\IAdminController;
use NACSL\Models\ViewModels\AdminMainVM;
use NACSL\Services\CptService;
use NACSL\Services\StartupService;

/**
 * NACSL-MANAGER App
 * @package NACSL
 */
final class App
{
    private static $_instance;

    /**
     * Get instance of NACSL-MANAGER App
     * @return App 
     */
    public static function GetInstance():App
    {
        if(self::$_instance == null)
            self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * NACSL-MANAGER App initialization
     */
    public function Init()
    {
        // Startup
        StartupService::LoadAssets();
        StartupService::Dependencies();
        StartupService::Update();
        StartupService::IsInstall();
        
        foreach (StartupService::$colRegister as $key => $register) {
            $register->Hook();
        }
    }
}
