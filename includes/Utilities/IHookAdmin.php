<?php

namespace NACSL\Utilities;

/**
 * Interface for admin Hook exclusively.
 * @package NACSL\Utilities
 */
interface IHookAdmin
{
    /**
     * Admin restricted hooks only.
     * @return void 
     */
    public function AdminHook():void;
};