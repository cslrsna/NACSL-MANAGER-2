<?php
namespace NACSL\Controllers;

use NACSL\Utilities\IHook;
use NACSL\Utilities\IHookAdmin;
use NACSL\Utilities\IHookPublic;

/**
 * Custom taxonomy controller interface
 * @package NACSL\Controllers
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