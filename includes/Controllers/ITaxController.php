<?php
namespace NACSL\Controllers;

use NACSL\Utilities\IHook;
use NACSL\Utilities\IHookAdmin;
use NACSL\Utilities\IHookPublic;

interface ITaxController extends IHook, IHookAdmin, IHookPublic
{
    public function Register():void;
    public function Unregister():void;
}