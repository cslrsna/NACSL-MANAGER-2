<?php
namespace NACSL\Services;

use NACSL\Models\CustomPostType;
use NACSL\Models\CustomTaxonomy;

interface ITaxService
{
    public function GetModel(string $name):CustomTaxonomy;
    public function GetObjectType(array|string $objType):mixed;
}