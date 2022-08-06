<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\TaxLabelsVM;
use NACSL\Utilities\AppConstants;

/**
 * @see https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @package NACSL\Models
 */
abstract class CustomTaxonomy
{
    public string $name;
    public TaxLabelsVM $labels;
    public array|string $object_type;
    public string $description;
    public bool $public  = true;
    //public bool $publicly_queryable;      // Default this->public;
    public bool $hierarchical = false;
    //public bool $show_ui;                 // Default this->public;
    //public bool $show_in_menu;            // Default this->show_ui;
    //public bool $show_in_nav_menus;       // Default this->public;
    public bool $show_in_rest = true;
    public string $rest_base;
    public string $rest_namespace = AppConstants::PREFIX;
    //public $rest_controller_class;        // WP_Post_Controller::class;
    //public bool $show_tagcloud = true;       // Default this->show_ui;
    //public bool $show_in_quick_edit = true;       // Default this->show_ui;
    //public bool $show_admin_column;       // Default this->public;
    //public bool $meta_box_cb;       // (bool|callable);
    //public bool $meta_box_sanitize_cb;       // (bool|callable) Default this->meta_box_cb
    //public array $capabilities;           // type string[] Default 'post'
    /*
    'manage_terms'
    (string) Default 'manage_categories'.
    'edit_terms'
    (string) Default 'manage_categories'.
    'delete_terms'
    (string) Default 'manage_categories'.
    'assign_terms'
    (string) Default 'edit_posts'.
     */
    public array $rewrite = array(
        'slug'                  => '',
        'with_front'            => true,
        'hierarchical'          => false,
        //'ep_mask'          => //(int) EP_NONE,
    );
    public string $query_var;   //(string|bool)
    //public string $update_count_callback;   //(callable)
    /*
    'name'
    (string) Name of default term.
    'slug'
    (string) Slug for default term.
    'description'
    (string) Description for default term.
    */
    //public string $sort;   //bool 
    //public string $args;   //(array) 
    //public string $_builtin;   //(bool) 
    //public string $capability_type;       // type string|array Default 'post';
    //public bool $map_meta_cap;            // type bool default false


    public function ToArray()
    {
        $arr = array();
        foreach ($this as $key => $value) {
            if( gettype($value) === TaxLabelsVM::class)
                $arr[$key] = $value->toArray();
            else if( $value != null )
                $arr[$key] = $value;
        }
        return $arr;
    }
}
