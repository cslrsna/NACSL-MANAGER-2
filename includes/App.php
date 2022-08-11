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
     * NACSL-MANAGER App initialization
     * @param array $starup 
     * @return void 
     */
    public function Init(array $starup)
    {
        call_user_func($starup);
    }

    public function Execute($actions):void
    {
        foreach ($actions as $action) {
            switch (true) {
                case $action instanceof IHook:
                    $action->Hook();
                case $action instanceof IHookAdmin:
                    $action->AdminHook();
                case $action instanceof IHookPublic:
                    $action->PublicHook();
            }
        }
    }
}
