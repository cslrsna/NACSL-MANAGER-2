<?php
namespace NACSL\Services;

use NACSL\Models\CustomTaxonomy;
use NACSL\Utilities\AppConstants;

class TaxService implements ITaxService
{

    public function GetObjectType(array|string $objType): mixed
    { 
        $strObjType = array();
        if( gettype($objType) == 'array')
        {
            foreach ($objType as $obj) {
                $strObjType[] = strtolower(AppConstants::PREFIX . $obj);
            }            
        }
        else if(gettype($objType) == 'string')
        {
            $strObjType[] = strtolower(AppConstants::PREFIX . $objType);
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
