<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\CptLabelsVM;
use NACSL\Utilities\AppConstants;
use WP_REST_Controller;

/**
 * Representation of all arguments that wordpress need to build a custom post type.
 * @see https://developer.wordpress.org/reference/functions/register_post_type/
 * @package NACSL\Models
 * @abstract
 */
abstract class CustomPostType
{

    /**
     * Option group slug for register_setting()
     * @see https://developer.wordpress.org/reference/functions/register_setting/
     * @var string
     */
    public string $option_group = '';

    /**
     * (Required) Post type key. Must not exceed 20 characters and may only contain lowercase alphanumeric characters, dashes, and underscores. See sanitize_key().
     * @see https://developer.wordpress.org/reference/functions/sanitize_key/
     * @var string
     */
    public string $post_type;

    /**
     * Name of the post type shown in the menu. Usually plural. Default is value of $labels['name'].
     * @var string
     */
    public string $label;

    /**
     * An array of labels for this post type. If not set, post labels are inherited for non-hierarchical types and page labels for hierarchical ones. See get_post_type_labels() for a full list of supported labels.
     * @link classes/NACSL-Models-ViewModels-CptLabelsVM.html
     * @var CptLabelsVM
     */
    public CptLabelsVM $labels;

    /**
     * A short descriptive summary of what the post type is.
     * @var string
     */
    public string $description;

    /**
     * Whether a post type is intended for use publicly either via the admin interface or by front-end users. While the default settings of $exclude_from_search, $publicly_queryable, $show_ui, and $show_in_nav_menus are inherited from $public, each does not rely on this relationship and controls a very specific intention. Default false.
     * @var bool
     */
    public bool $public  = true;

    /**
     * Whether the post type is hierarchical (e.g. page). Default false.
     * @var bool
     */
    public bool $hierarchical;

    /**
     * Whether to exclude posts with this post type from front end search results. Default is the opposite value of $public.
     * @var bool
     */
    public bool $exclude_from_search;

    /**
     * Whether queries can be performed on the front end for the post type as part of parse_request(). Endpoints would include:
     * @example: ?post_type={post_type_key}
     * @example: ?{post_type_key}={single_post_slug}
     * @example: ?{post_type_query_var}={single_post_slug} 
     * @example: If not set, the default is inherited from $public.
     * @var bool
     */
    public bool $publicly_queryable;

    /**
     * Whether to generate and allow a UI for managing this post type in the admin. Default is value of $public.
     * @var bool
     */
    public bool $show_ui;
    
    /**
     * Where to show the post type in the admin menu. To work, $show_ui must be true. If true, the post type is shown in its own top level menu. If false, no menu is shown. If a string of an existing top level menu ('tools.php' or 'edit.php?post_type=page', for example), the post type will be placed as a sub-menu of that. Default is value of $show_ui.
     * @var bool|string
     */
    public bool|string $show_in_menu;

    /**
     * Makes this post type available for selection in navigation menus. Default is value of $public.
     * @var bool
     */
    public bool $show_in_nav_menus;
    
    /**
     * Makes this post type available via the admin bar. Default is value of $show_in_menu.
     * @var bool
     */
    public bool $show_in_admin_bar;
    
    /**
     * Whether to include the post type in the REST API. Set this to true for the post type to be available in the block editor.
     * @var bool
     */
    public bool $show_in_rest = true;

    /**
     * To change the base URL of REST API route. Default is $post_type.
     * @var string
     */
    public string $rest_base;

    /**
     * To change the namespace URL of REST API route. Default is wp/v2. [AppConstants::PREFIX]
     * @var string
     */
    public string $rest_namespace;
    
    /**
     * REST API controller class name. Default is 'WP_REST_Posts_Controller'.
     * @see https://developer.wordpress.org/reference/classes/wp_rest_posts_controller/
     * @var WP_REST_Controller
     */
    public WP_REST_Controller $rest_controller_class;

    /**
     * The position in the menu order the post type should appear. To work, $show_in_menu must be true. Default null (at the bottom).
     * @var int
     */
    public int $menu_position = -1;

    /**
     * The URL to the icon to be used for this menu. Pass a base64-encoded SVG using a data URI, which will be colored to match the color scheme -- this should begin with 'data:image/svg+xml;base64,'. Pass the name of a Dashicons helper class to use a font icon, e.g. 'dashicons-chart-pie'. Pass 'none' to leave div.wp-menu-image empty so an icon can be added via CSS. Defaults to use the posts icon.
     * @var string
     */
    public string $menu_icon;

    /**
     * The string to use to build the read, edit, and delete capabilities. May be passed as an array to allow for alternative plurals when using this argument as a base to construct the capabilities, e.g. array('story', 'stories'). Default 'post'.
     * @var string|array
     */
    public string|array $capability_type = 'page';       // type string|array Default 'post';
    
    /**
     * (string[]) Array of capabilities for this post type. $capability_type is used as a base to construct capabilities by default. See get_post_type_capabilities().
     * @see https://developer.wordpress.org/reference/functions/get_post_type_capabilities/
     * @var array
     */
    public array $capabilities;

    /**
     * Whether to use the internal default meta capability handling. Default false.
     * @var bool
     */
    public bool $map_meta_cap;
    
    /**
     * Core feature(s) the post type supports. Serves as an alias for calling add_post_type_support() directly. Core features include 'title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', and 'post-formats'. Additionally, the 'revisions' feature dictates whether the post type will store revisions, and the 'comments' feature dictates whether the comments count will show on the edit screen. A feature can also be specified as an array of arguments to provide additional information about supporting that feature. Default is an array containing 'title' and 'editor'.
     * @example: array( 'my_feature', array( 'field' => 'value' ) )
     * @see https://developer.wordpress.org/reference/functions/add_post_type_support/
     * @var array
     */
    public array $supports = array( 'title', 'thumbnail');

    /**
     * Provide a callback function that sets up the meta boxes for the edit form. Do remove_meta_box() and add_meta_box() calls in the callback. Default null.
     * @see https://developer.wordpress.org/reference/functions/add_meta_box/
     * @see https://developer.wordpress.org/reference/functions/remove_meta_box/
     * @var string|array [callable]
     */
    public string|array $register_meta_box_cb;

    /**
     * An array of taxonomy identifiers that will be registered for the post type. Taxonomies can be registered later with register_taxonomy() or register_taxonomy_for_object_type().
     * @see https://developer.wordpress.org/reference/functions/register_taxonomy/
     * @see https://developer.wordpress.org/reference/functions/register_taxonomy_for_object_type/
     * @var array
     */
    public array $taxonomies;

    /**
     * Whether there should be post type archives, or if a string, the archive slug to use. Will generate the proper rewrite rules if $rewrite is enabled. Default false.
     * @var bool|string
     */
    public bool|string $has_archive;

    /**
     * Triggers the handling of rewrites for this post type. To prevent rewrite, set to false. Defaults to true, using $post_type as slug. To specify rewrite rules, an array can be passed with any of these keys:
     * @key slug (string) Customize the permastruct slug. Defaults to $post_type key.
     * @key with_front (bool) Whether the permastruct should be prepended with WP_Rewrite::$front. Default true.
     * @key feeds Whether the feed permastruct should be built for this post type. Default is value of $has_archive.
     * @key pages (bool) Whether the permastruct should provide for pagination. Default true.
     * @key ep_mask (int) Endpoint mask to assign. If not specified and permalink_epmask is set, inherits from $permalink_epmask. If not specified and permalink_epmask is not set, defaults to EP_PERMALINK.
     * @var bool|array
     */
    public bool|array $rewrite;

    /**
     * Sets the query_var key for this post type. Defaults to $post_type key. If false, a post type cannot be loaded at ?{query_var}={post_slug}. If specified as a string, the query ?{query_var_string}={post_slug} will be valid.
     * @var string|bool
     */
    public string|bool $query_var;

    /**
     * Whether to allow this post type to be exported. Default true.
     * @var bool
     */
    public bool $can_export;

    /**
     * Whether to delete posts of this type when deleting a user.
     * - If true, posts of this type belonging to the user will be moved to Trash when the user is deleted.
     * - If false, posts of this type belonging to the user will *not* be trashed or deleted.
     * - If not set (the default), posts are trashed if post type supports the 'author' feature. Otherwise posts are not trashed or deleted. Default null.
     * @var bool
     */
    public bool $delete_with_user;

    /**
     * Array of blocks to use as the default initial state for an editor session. Each item should be an array containing block name and optional attributes.
     * @var array
     */
    public array $template;

    /**
     * Whether the block template should be locked if $template is set. 
     * - If set to 'all', the user is unable to insert new blocks, move existing blocks and delete blocks.
     * - If set to 'insert', the user is able to move existing blocks but is unable to insert new blocks and delete blocks. Default false.
     * @var string|false
     */
    public string|false $template_lock;

    /**
     * FOR INTERNAL USE ONLY! True if this post type is a native or "built-in" post_type. Default false.
     * @var bool
     */
    public bool $_builtin;
    
    /**
     * FOR INTERNAL USE ONLY! URL segment to use for edit link of this post type. Default 'post.php?post=%d'. Default value: array()
     * @var string
     */
    public string $_edit_link;

    public function __construct(string $name, CptLabelsVM $labels)
    {
        $this->rest_namespace = rtrim(AppConstants::PREFIX, '_');
        $this->menu_icon = AppConstants::$adminUrl . "images/logo-na.svg"; 
        $this->post_type = strtolower(AppConstants::PREFIX . $name);
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
            if( gettype($value) === CptLabelsVM::class )
                $args[$key] = $value->toArray();
            else if( isset($value)  )
                $args[$key] = $value;
        }
        return $args;
    }
}
