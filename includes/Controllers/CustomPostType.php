<?php
namespace NACSL\Controllers;

use NACSL\Models\CustomPostType as ModelsCustomPostType;
use NACSL\Services\ICptService;

/**
 * Generic custom Post type controller
 * @package NACSL\Controllers
 */
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


    /**
     * All unregister logic for all costom post type
     * @return void 
     */
    public function Unregister(): void 
    { 
        unregister_post_type($this->model->post_type);
    }
    
    /**
     * All register logic for all costom post type
     * @return void 
     */
    public function Register(): void 
    {
        register_post_type($this->model->post_type, $this->model->ToArray());
    }

    /**
     * No restricted hook [admin and public] for all custom post type
     * @return void 
     */
    public function Hook(): void 
    { 
        add_action('init', [$this, 'Register']);
    }

    public function AdminMenu(): void { }

    public function Options(): void { }

    public function AdminHook(): void { }

    public function PublicHook(): void { }
}
