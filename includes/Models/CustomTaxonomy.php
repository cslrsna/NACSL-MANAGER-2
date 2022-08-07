<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\TaxLabelsVM;
use NACSL\Utilities\AppConstants;

/**
 * Representation of all arguments that wordpress need to build a custom taxonomy.
 * @see https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @package NACSL\Models
 */
abstract class CustomTaxonomy
{
    /**
     *  (Required) Taxonomy key, must not exceed 32 characters. It's automatically generated with the inherited class name.
     * @var string
     */
    public string $taxonomy;

    /**
     * (Required) Object type or array of object types with which the taxonomy should be associated.
     * @var array|string
     */
    public array|string $object_type;

    /**
     * An array of labels for this taxonomy. By default, Tag labels are used for non-hierarchical taxonomies, and Category labels are used for hierarchical taxonomies. See accepted values in get_taxonomy_labels().
     * @see https://developer.wordpress.org/reference/functions/get_taxonomy_labels/
     * @var TaxLabelsVM
     */
    public TaxLabelsVM $labels;

    /**
     * A short descriptive summary of what the taxonomy is for.
     * @var string
     */
    public string $description;

    /**
     * Whether a taxonomy is intended for use publicly either via the admin interface or by front-end users. The default settings of $publicly_queryable, $show_ui, and $show_in_nav_menus are inherited from $public.
     * @var bool
     */
    public bool $public  = true;

    /**
     * Whether the taxonomy is publicly queryable. If not set, the default is inherited from $public
     * @var bool
     */
    public bool $publicly_queryable;

    /**
     * Whether the taxonomy is hierarchical. Default false.
     * @var bool
     */
    public bool $hierarchical;
    
    /**
     * Whether to generate and allow a UI for managing terms in this taxonomy in the admin. If not set, the default is inherited from $public (default true).
     * @var bool
     */
    public bool $show_ui;
    
    /**
     * Whether to show the taxonomy in the admin menu. If true, the taxonomy is shown as a submenu of the object type menu. If false, no menu is shown. $show_ui must be true. If not set, default is inherited from $show_ui (default true).
     * @var bool
     */
    public bool $show_in_menu;
    
    /**
     * Makes this taxonomy available for selection in navigation menus. If not set, the default is inherited from $public (default true).
     * @var bool
     */
    public bool $show_in_nav_menus;

    /**
     * Whether to include the taxonomy in the REST API. Set this to true for the taxonomy to be available in the block editor.
     * @var bool
     */
    public bool $show_in_rest = true;

    /**
     * To change the base url of REST API route. Default is $taxonomy.
     * @var string
     */
    public string $rest_base;

    /**
     * To change the namespace URL of REST API route. Default is wp/v2 [rtrim(AppConstants::PREFIX, '_')]
     * @var string
     */
    public string $rest_namespace;

    /**
     * REST API Controller class name. Default is 'WP_REST_Terms_Controller'.
     * @see https://developer.wordpress.org/reference/classes/wp_rest_terms_controller/
     * @var mixed
     */
    public $rest_controller_class;
    
    /**
     * Whether to list the taxonomy in the Tag Cloud Widget controls. If not set, the default is inherited from $show_ui (default true).
     * @var bool
     */
    public bool $show_tagcloud;
    
    /**
     * Whether to show the taxonomy in the quick/bulk edit panel. It not set, the default is inherited from $show_ui (default true).
     * @var bool
     */
    public bool $show_in_quick_edit;
    
    /**
     * Whether to display a column for the taxonomy on its post type listing screens. Default false.
     * @var bool
     */
    public bool $show_admin_column;
    
    /**
     * Provide a callback function for the meta box display. If not set, post_categories_meta_box() is used for hierarchical taxonomies, and post_tags_meta_box() is used for non-hierarchical. If false, no meta box is shown.
     * @see https://developer.wordpress.org/reference/functions/post_categories_meta_box/
     * @see https://developer.wordpress.org/reference/functions/post_tags_meta_box/
     * @var bool|array|string callable
     */
    public bool|array|string $meta_box_cb;
    
    /**
     * Callback function for sanitizing taxonomy data saved from a meta box. If no callback is defined, an appropriate one is determined based on the value of $meta_box_cb.
     * @var array|string callable
     */
    public array|string $meta_box_sanitize_cb;

    /**
     * (string[]) Array of capabilities for this taxonomy.
     * @var array
     */
    public array $capabilities = array(
        'manage_terms' => 'manage_categories',
        'edit_terms' => 'manage_categories',
        'delete_terms' => 'manage_categories',
        'assign_terms' => 'edit_posts',
    );

    /**
     * Triggers the handling of rewrites for this taxonomy. Default true, using $taxonomy as slug. To prevent rewrite, set to false. To specify rewrite rules, an array can be passed with any of these keys:
     * @key slug (string) Customize the permastruct slug. Default $taxonomy key.
     * @key with_front (bool) Should the permastruct be prepended with WP_Rewrite::$front. Default true.
     * @key hierarchical (bool) Either hierarchical rewrite tag or not. Default false.
     * @key ep_mask (int) Assign an endpoint mask. Default EP_NONE.
     * @var bool|array
     */
    public bool|array $rewrite;

    /**
     * Sets the query var key for this taxonomy. Default $taxonomy key. If false, a taxonomy cannot be loaded at ?{query_var}={term_slug}. If a string, the query ?{query_var}={term_slug} will be valid.
     * @var string|bool
     */
    public string|bool $query_var;

    /**
     * Works much like a hook, in that it will be called when the count is updated. Default _update_post_term_count() for taxonomies attached to post types, which confirms that the objects are published before counting them. Default _update_generic_term_count() for taxonomies attached to other object types, such as users.
     * @see https://developer.wordpress.org/reference/functions/_update_post_term_count/
     * @see https://developer.wordpress.org/reference/functions/_update_generic_term_count/
     * @var array|string callable
     */
    public array|string $update_count_callback;

    /**
     * Default term to be used for the taxonomy.
     * @key name (string) Name of default term.
     * @key slug (string) Slug for default term.
     * @key description (string) Description for default term.
     * @var string|array
     */
    public string|array $default_term;
    
    /**
     * Whether terms in this taxonomy should be sorted in the order they are provided to wp_set_object_terms(). Default null which equates to false.
     * @see https://developer.wordpress.org/reference/functions/wp_set_object_terms/
     * @var bool
     */
    public bool $sort;

    /**
     * Array of arguments to automatically use inside wp_get_object_terms() for this taxonomy.
     * @see https://developer.wordpress.org/reference/functions/wp_get_object_terms/
     * @var array
     */
    public array $args;

    /**
     * This taxonomy is a "built-in" taxonomy. INTERNAL USE ONLY! Default false.
     * @var bool
     */
    public bool $_builtin;

    public function __construct(string $name, TaxLabelsVM $labels)
    {
        $this->rest_namespace = rtrim(AppConstants::PREFIX, '_');
        $this->menu_icon = AppConstants::$adminUrl . "images/logo-na.svg";
        $this->taxonomy = strtolower(AppConstants::PREFIX . $name);
        $this->labels = $labels;
    }

    /**
     * Return this object as an array as wordpress expected it. If properity value is null, the value will has the default value from wordpress system.
     * @return array 
     */
    public function ToArray()
    {
        $args = array();
        foreach ($this as $key => $value) {
            if( gettype($value) === TaxLabelsVM::class)
                $args[$key] = $value->toArray();
            else if( isset($value) )
                $args[$key] = $value;
        }
        return $args;
    }
}
