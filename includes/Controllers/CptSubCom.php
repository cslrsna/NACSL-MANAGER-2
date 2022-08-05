<?php
namespace NACSL\Controllers;

use NACSL\Services\ICptService;

class CptSubCom extends CustomPostType
{
    public function __construct(ICptService $cptServ)
    {
        parent::__construct($cptServ);
    }

    public function Unregister(): void 
    { 
        unregister_post_type($this->model->name);
    }
    
    public function Register(): void 
    {
        //wp_die(print_r($this->model));
        register_post_type($this->model->name, $this->model->ToArray());
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