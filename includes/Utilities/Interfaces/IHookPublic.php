<?php

namespace NACSL\Utilities\Interfaces;

/**
 * Interface for public Hook exclusively.
 * @package NACSL\Utilities\Interfaces
 */
interface IHookPublic
{
    /**
     * Public restricted hooks only.
     * @return void 
     */
    public function PublicHook():void;
};