<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\CptLabelsVM;
use NACSL\Utilities\AppConstants;

abstract class CustomPostType
{
    public string $name;
    public CptLabelsVM $labels;
    public string $description;
    public bool $public  = true;
    public bool $hierarchical = false;
    public bool $exclude_from_search = false;
    //public bool $publicly_queryable;      // Default this->public;
    //public bool $show_ui;                 // Default this->public;
    //public bool $show_in_menu;            // Default this->show_ui;
    //public bool $show_in_nav_menus;       // Default this->public;
    //public bool $show_in_admin_bar;       // Default this->show_in_menu;
    public bool $show_in_rest = true;
    public string $rest_base;
    public string $rest_namespace = AppConstants::PREFIX;
    //public $rest_controller_class;        // WP_Post_Controller::class;
    public int $menu_position = -1;
    public string $menu_icon = '';
    //public string $capability_type;       // type string|array Default 'post';
    //public array $capabilities;           // type string[] Default 'post'
    //public bool $map_meta_cap;            // type bool default false
    public array $supports = array( 'title', 'thumbnail');

    public array $rewrite = array(
        'slug'                  => '',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );

    public function ToArray()
    {
        $arr = array();
        foreach ($this as $key => $value) {
            if( gettype($value) === CptLabelsVM::class )
                $arr[$key] = $value->toArray();
            else
                $arr[$key] = $value;
        }
        return $arr;
    }
}
