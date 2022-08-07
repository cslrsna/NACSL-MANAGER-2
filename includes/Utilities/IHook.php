<?php

namespace NACSL\Utilities;

/**
 * Interface for basic Hook [admin and public] 
 * @package NACSL\Utilities
 */
interface IHook
{
    /**
     * No restricted hook [admin and public]
     * @return void 
     */
    public function Hook():void;
};