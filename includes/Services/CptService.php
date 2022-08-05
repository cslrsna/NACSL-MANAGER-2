<?php
namespace NACSL\Services;

use NACSL\Models\CustomPostType as CptModel;

class CptService implements ICptService
{

    public function GetModel(string $name):CptModel 
    { 
        $modelName = "NACSL\Models\\$name";
        $viewLabelModel = "NACSL\Models\ViewModels\\{$name}LabelsVM";
        $data = new $modelName($name, new $viewLabelModel );
        return $data;
    }
    
}
