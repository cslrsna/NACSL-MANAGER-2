<?php
namespace NACSL\Controllers;

use NACSL\Models\CustomTaxonomy as ModelsCustomTaxonomy;
use NACSL\Services\ITaxService;

abstract class CustomTaxonomy implements ITaxController
{
    protected ITaxService $_taxServ;
    public ModelsCustomTaxonomy $model;
    public array|string $objType;

    public function __construct(ITaxService $taxServ, array|string $objType)
    {
        $this->_taxServ = $taxServ;
        $taxName = explode('\\',$this::class);
        $this->model = $this->_taxServ->GetModel(end($taxName));
        $this->objType = $objType;
    }
}
