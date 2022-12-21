<?php
namespace NACSL;

use NACSL\Utilities\Interfaces\IHook;
use NACSL\Utilities\Interfaces\IHookAdmin;
use NACSL\Utilities\Interfaces\IHookPublic;

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
     * Execute NACSL App
     * @param array $actions 
     * @return void 
     */
    public function Execute(array $actions):void
    {
        foreach ($actions as $action) {
            $interfaces = class_implements($action);
            $ns = 'NACSL\\Utilities\\Interfaces\\';

            if(in_array("{$ns}IHook", $interfaces))         $action->Hook();
            if(in_array("{$ns}IHookAdmin", $interfaces))    $action->AdminHook();
            if(in_array("{$ns}IHookPublic", $interfaces))   $action->PublicHook();

            unset($interfaces);
        }
    }
}
