<?php
namespace NACSL\Services;

use NACSL\Models\CustomPostType;
use NACSL\Models\CustomTaxonomy;

class TaxService implements ITaxService
{

    public function GetObjectType(array|CustomPostType $objType): mixed
    { 
        $strObjType = array();
        if( gettype($objType) == CustomPostType::class )
        {
            foreach ($objType as $obj) {
                $strObjType[] = $obj->name;
            }            
        }
        else
        {
            $strObjType[] = $objType->name;
        }
        return $strObjType;
    }

    public function GetModel(string $name):CustomTaxonomy 
    { 
        $modelName = "NACSL\Models\\$name";
        $viewLabelModel = "NACSL\Models\ViewModels\\{$name}LabelsVM";
        $data = new $modelName($name, new $viewLabelModel );
        return $data;
    }
    
}
