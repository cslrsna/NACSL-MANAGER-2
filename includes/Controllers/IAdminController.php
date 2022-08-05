<?php
namespace NACSL\Controllers;

use NACSL\Utilities\IHook;
use NACSL\Utilities\IHookAdmin;
use NACSL\Utilities\IHookPublic;

interface IAdminController extends IHookAdmin
{
    public function AdminMenu(string $context):void;
}