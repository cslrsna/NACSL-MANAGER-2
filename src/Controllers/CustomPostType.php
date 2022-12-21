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
    protected bool $hasOptions = false;

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
     * All register logic for all costom post type
     * @return void 
     */
    public function Register(): void 
    {
        register_post_type($this->slug, $this->model->ToArray());
    } 

    /**
     * All unregister logic for all costom post type
     * @return void 
     */
    public function Unregister(): void 
    { 
        if( get_object_taxonomies( $this->slug ) )
            foreach ($this->taxSubmenuOptions['taxonomies'] as $tax) {
                unregister_setting($this->taxSubmenuOptions['option_group'], $tax['id']);
            }

        unregister_post_type($this->slug);
    }   

    /**
     * Add admin custom post type submenu
     * @return void 
     */
    public function AdminOptionsSubmenu(): void 
    {   
        if( get_object_taxonomies( $this->slug ) || $this->hasOptions )
        {
            $this->_CptServ->BuildSubmenuOptions('admin/form/AdminOptionsForm.twig', $this->model );
            
            if( get_object_taxonomies( $this->slug ) )
            {
                $this->taxSubmenuOptions = $this->_CptServ->GetTaxOptions($this->slug);
                $this->_CptServ->ShowTaxSubmenuOptions($this->slug, $this->taxSubmenuOptions['fields']);
            }
        }
    }

    /**
     * Custom post type options
     * @return void 
     */
    public function Options(): void
    {
        if( get_object_taxonomies( $this->slug ) )
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
            add_action('admin_menu', [$this, 'AdminOptionsSubmenu']);
            add_action('admin_init', [$this, 'Options']);
        }       
    }

    /**
     * Public hooks only
     * @return void 
     */
    public function PublicHook(): void { }
}
