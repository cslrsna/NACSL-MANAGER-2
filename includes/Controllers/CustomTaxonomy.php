<?php
namespace NACSL\Controllers;

use NACSL\Models\CustomTaxonomy as ModelsCustomTaxonomy;
use NACSL\Services\ITaxService;

/**
 * Custom taxonomy builder
 * @package NACSL\Controllers
 */
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
        $this->objType = $this->_taxServ->GetObjectType($objType);
    }

    
    public function Register(): void 
    {
        register_taxonomy($this->model->taxonomy, $this->objType, $this->model->ToArray());
    }

    public function Unregister(): void 
    { 
        unregister_post_type($this->model->taxonomy);
    }

    public function Hook(): void 
    { 
        add_action('init', [$this, 'Register']);
    }
}
