<?php
namespace NACSL\Controllers\Interfaces;

use NACSL\Utilities\Interfaces\IHook;
use NACSL\Utilities\Interfaces\IHookAdmin;
use NACSL\Utilities\Interfaces\IHookPublic;
/**
 * Custom Post type controller interface
 * @package NACSL\Controllers\Interfaces
 */
interface ICptController extends IHook, IHookAdmin, IHookPublic
{
    /**
     * Register custom post type
     * @return void 
     */
    public function Register():void;

    /**
     * Unregister custom post type
     * @return void 
     */
    public function Unregister():void;

    /**
     * Add admin menu
     * @return void 
     */
    public function AdminOptionsSubmenu():void;

    /**
     * Add options to the custom post type
     * @return void 
     */
    public function Options():void;
}