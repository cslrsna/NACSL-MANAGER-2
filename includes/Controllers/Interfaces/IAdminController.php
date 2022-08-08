<?php
namespace NACSL\Controllers\Interfaces;

use NACSL\Utilities\Interfaces\IHookAdmin;

interface IAdminController extends IHookAdmin
{
    public function AdminMenu(string $context):void;
}