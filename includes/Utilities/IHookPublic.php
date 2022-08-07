<?php

namespace NACSL\Utilities;

/**
 * Interface for public Hook exclusively.
 * @package NACSL\Utilities
 */
interface IHookPublic
{
    /**
     * Public restricted hooks only.
     * @return void 
     */
    public function PublicHook():void;
};