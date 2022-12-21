<?php

namespace NACSL\Utilities\Interfaces;

/**
 * Interface for admin Hook exclusively.
 * @package NACSL\Utilities\Interfaces
 */
interface IHookAdmin
{
    /**
     * Admin restricted hooks only.
     * @return void 
     */
    public function AdminHook():void;
};