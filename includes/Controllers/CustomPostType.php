<?php
namespace NACSL\Controllers;

use NACSL\Controllers\Interfaces\ICptController;
use NACSL\Models\CustomPostType as ModelsCustomPostType;
use NACSL\Services\Interfaces\ICptService;

/**
 * Generic custom Post type controller
 * @package NACSL\Controllers
 */
abstract class CustomPostType implements ICptController
{
    protected ICptService $_CptServ;
    public ModelsCustomPostType $model;
    public string $name;
    
    public function __construct(ICptService $cptServ)
    {
        $this->_CptServ = $cptServ;
        $cptName = explode('\\',$this::class);
        $this->model = $this->_CptServ->GetModel(end($cptName));
        $this->name = $this->model->post_type;
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

    public function AdminHook(): void { }

    public function PublicHook(): void { }
}
