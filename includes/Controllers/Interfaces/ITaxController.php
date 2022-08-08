<?php
namespace NACSL\Controllers\Interfaces;

use NACSL\Utilities\Interfaces\IHook;
use NACSL\Utilities\Interfaces\IHookAdmin;
use NACSL\Utilities\Interfaces\IHookPublic;

/**
 * Custom taxonomy controller interface
 * @package NACSL\Controllers\Interfaces
 */
interface ITaxController extends IHook, IHookAdmin, IHookPublic
{
    /**
     * Register custom taxonomy
     * @return void 
     */
    public function Register():void;


    /**
     * Unregister custom taxonomy
     * @return void 
     */
    public function Unregister():void;
}