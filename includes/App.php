<?php
namespace NACSL;

use NACSL\Services\SetupService;
/**
 * App
 * @package NACSL
 */
final class App
{
    private static $_instance;

    private function __construct(){}

    /**
     * Get instance of App
     * @return App 
     */
    public static function GetInstance():App
    {
        if(self::$_instance == null)
            self::$_instance = new self();
        return self::$_instance;
    }

    /**
     * App initialisation
     */
    public function Init()
    {
        SetupService::Dependencies();
        SetupService::Update();
    }
}
