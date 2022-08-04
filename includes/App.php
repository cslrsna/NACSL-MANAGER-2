<?php
namespace NACSL;

use NACSL\Services\SetupService;

final class App
{
    private static $_instance;

    private function __construct(){}

    public static function GetInstance():App
    {
        if(self::$_instance == null)
            self::$_instance = new self();
        return self::$_instance;
    }

    public function Init()
    {
        SetupService::Dependencies();
        SetupService::Update();
    }
}
