<?php
namespace NACSL\Controllers;

use NACSL\Controllers\Interfaces\ICptController;
use NACSL\Models\CustomPostType as CptModel;
use NACSL\Services\Interfaces\ICptService;

/**
 * Generic custom Post type controller
 * @package NACSL\Controllers
 */
abstract class CustomPostType implements ICptController
{
    protected ICptService $_CptServ;
    public CptModel $model;
    private array $taxSubmenuOptions = array();

    /**
     * @uses NACSL\Models\CustomPostType::post_type
     * @var string
     */
    public string $slug;
    
    public function __construct(ICptService $cptServ)
    {
        $this->_CptServ = $cptServ;
        $cptName = explode('\\',$this::class);
        $this->model = $this->_CptServ->GetModelData(end($cptName));
        $this->slug = $this->model->post_type;
    }


    /**
     * All unregister logic for all costom post type
     * @return void 
     */
    public function Unregister(): void 
    { 
        if( get_taxonomies( ['object_type' => [$this->slug]] ) )
            foreach ($this->taxSubmenuOptions['taxonomies'] as $tax) {
                unregister_setting($this->taxSubmenuOptions['option_group'], $tax['id']);
            }

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

    public function AdminMenu(): void 
    {   
        if( get_taxonomies( ['object_type' => [$this->slug]] ) )
        {
            $this->taxSubmenuOptions = $this->_CptServ->GetTaxOptions($this->slug);
            $this->_CptServ->GetTaxSubmenuOptions('admin/form/AdminOptionsForm.twig', $this->model );
            $this->_CptServ->ShowTaxSubmenuOptions($this->slug, $this->taxSubmenuOptions['fields']);
        }
    }

    public function Options(): void
    {
        if( get_taxonomies( ['object_type' => [$this->slug]] ) )
            $this->_CptServ->TaxOptionsFactory($this->taxSubmenuOptions);
    }

    /**
     * Standard hook no restriction.
     * @return void 
     */
    public function Hook(): void 
    { 
        add_action('init', [$this, 'Register']);
    }

    /**
     * Admin hooks only
     * @return void 
     */
    public function AdminHook(): void 
    { 
        if( is_admin())
        {
            add_action('admin_menu', [$this, 'AdminMenu']);
            add_action('admin_init', [$this, 'Options']);
        }       
    }

    /**
     * Public hooks only
     * @return void 
     */
    public function PublicHook(): void { }
}
