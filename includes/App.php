<?php
namespace NACSL;

use NACSL\Services\StartupService;

/**
 * NACSL-MANAGER App
 * @package NACSL
 */
final class App
{
    private static $_instance;

    private function __construct(){}

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
        StartupService::LoadAssets();
        StartupService::Dependencies();
        StartupService::Update();
        StartupService::IsInstall();
    }
}
