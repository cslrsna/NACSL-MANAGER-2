<?php
namespace NACSL\Services;

use NACSL\Models\CustomPostType as CptModel;
use NACSL\Services\Interfaces\ICptService;

class CptService implements ICptService
{

    public function GetModelData(string $name):CptModel 
    { 
        $modelName = "NACSL\Models\\$name";
        $viewLabelModel = "NACSL\Models\ViewModels\\{$name}LabelsVM";
        $data = new $modelName($name, new $viewLabelModel );
        return $data;
    }
    
}
