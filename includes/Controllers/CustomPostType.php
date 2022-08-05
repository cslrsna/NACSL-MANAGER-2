<?php
namespace NACSL\Controllers;

use NACSL\Models\CustomPostType as ModelsCustomPostType;
use NACSL\Services\ICptService;

abstract class CustomPostType implements ICptController
{
    protected ICptService $_CptServ;
    public ModelsCustomPostType $model;
    public function __construct(ICptService $cptServ)
    {
        $this->_CptServ = $cptServ;
        $cptName = explode('\\',$this::class);
        $this->model = $this->_CptServ->GetModel(end($cptName));
    }
}
