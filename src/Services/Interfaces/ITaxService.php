<?php
namespace NACSL\Services\Interfaces;

use NACSL\Models\CustomTaxonomy;

/**
 * Basic service methods for NACSL\Controller\CustomTaxonomy
 * @package NACSL\Services\Interfaces
 */
interface ITaxService
{
    /**
     * Get the specific CustomTaxonomy model for NACSL\Controller\CustomTaxonomy to build a custom taxonomy.
     * @param string $name 
     * @return NACSL\Models\CustomTaxonomy 
     */
    public function GetModel(string $name):CustomTaxonomy;

    /**
     * Get refer custom post type to build the custom taxonomy.
     * @param array|string $objType 
     * @return mixed 
     */
    public function GetObjectType(array|string $objType):mixed;
}