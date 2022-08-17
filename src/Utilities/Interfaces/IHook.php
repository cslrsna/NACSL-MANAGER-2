<?php

namespace NACSL\Utilities\Interfaces;

/**
 * Interface for basic Hook [admin and public] 
 * @package NACSL\Utilities\Interfaces
 */
interface IHook
{
    /**
     * No restricted hook [admin and public]
     * @return void 
     */
    public function Hook():void;
};