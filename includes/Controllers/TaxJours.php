<?php
namespace NACSL\Controllers;

use NACSL\Models\CustomPostType as CptModel;
use NACSL\Services\ITaxService;

class CptGroups extends CustomTaxonomy
{
    public function __construct(ITaxService $taxServ, array|CptModel $objType)
    {
        parent::__construct($taxServ, $objType);
    }

    public function Unregister(): void 
    { 
        unregister_post_type($this->model->name);
    }
    
    public function Register(): void 
    {
        register_taxonomy($this->model->name, $this->model->ToArray());
    }

    public function AdminMenu(): void { }

    public function Options(): void { }

    public function Hook(): void 
    { 
        add_action('init', [$this, 'Register']);
    }

    public function AdminHook(): void { }

    public function PublicHook(): void { }
}
