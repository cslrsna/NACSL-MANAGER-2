<?php
namespace NACSL\Controllers;

use NACSL\Utilities\IHook;
use NACSL\Utilities\IHookAdmin;
use NACSL\Utilities\IHookPublic;
/**
 * Custom Post type controller interface
 * @package NACSL\Controllers
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
    public function AdminMenu():void;

    /**
     * Add options to the custom post type
     * @return void 
     */
    public function Options():void;
}