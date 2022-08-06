<?php
namespace NACSL\Controllers;

use NACSL\Models\CustomPostType as CptModel;
use NACSL\Models\CustomTaxonomy as ModelsCustomTaxonomy;
use NACSL\Services\ITaxService;

abstract class CustomTaxonomy implements ITaxController
{
    protected ITaxService $_taxServ;
    public ModelsCustomTaxonomy $model;
    public array $objType;

    public function __construct(ITaxService $taxServ, array|CptModel $objType)
    {
        $this->_taxServ = $taxServ;
        $taxName = explode('\\',$this::class);
        $this->model = $this->_taxServ->GetModel(end($taxName));
        $this->objType = $this->_taxServ->GetObjectType($objType);
    }
}
