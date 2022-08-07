<?php
namespace NACSL\Controllers;

use NACSL\Utilities\IHook;
use NACSL\Utilities\IHookAdmin;
use NACSL\Utilities\IHookPublic;

/**
 * Basic methods for NACSL\Controller\CustomTaxonomy
 * @package NACSL\Controllers
 */
interface ITaxController extends IHook, IHookAdmin, IHookPublic
{
    /**
     * Registering method to build the custom taxonomy.
     * @return void 
     */
    public function Register():void;


    /**
     * Unregistering method to erase the custom taxonomy from the wordpress system.
     * @return void 
     */
    public function Unregister():void;
}