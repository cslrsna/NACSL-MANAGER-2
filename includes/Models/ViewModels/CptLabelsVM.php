<?php

namespace NACSL\Models\ViewModels;

use NACSL\Models\ViewModels\Interfaces\IViewModel;

/**
 * Representation of all labels that wordpress need to build a custom post type.
 * @see https://developer.wordpress.org/reference/functions/get_post_type_labels/
 * @package NACSL\Models\ViewModels
 */
abstract class CptLabelsVM implements IViewModel
{
    /**
     * General name for the post type, usually plural. The same and overridden by $post_type_object->label. Default is ‘Posts’ / ‘Pages’.
     * @var string
     */
    public string $name;

    /**
     *  Name for one object of this post type. Default is ‘Post’ / ‘Page’.
     * @var string
     */
    public string $singular_name;

    /**
     * Default is ‘Add New’ for both hierarchical and non-hierarchical types. When internationalizing this string, please use a gettext context matching your post type. Example: _x( 'Add New', 'product', 'textdomain' );.
     * @see https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/#disambiguation-by-context
     * @var string
     */
    public string $add_new;

    /**
     * Label for adding a new singular item. Default is ‘Add New Post’ / ‘Add New Page’.
     * @var string
     */
    public string $add_new_item;

    /**
     * Label for editing a singular item. Default is ‘Edit Post’ / ‘Edit Page’.
     * @var string
     */
    public string $edit_item;

    /**
     * Label for the new item page title. Default is ‘New Post’ / ‘New Page’.
     * @var string
     */
    public string $new_item;

    /**
     * Label for viewing a singular item. Default is ‘View Post’ / ‘View Page’.
     * @var string
     */
    public string $view_item;

    /**
     * Label for viewing post type archives. Default is ‘View Posts’ / ‘View Pages’.
     * @var string
     */
    public string $view_items;

    /**
     * Label for searching plural items. Default is ‘Search Posts’ / ‘Search Pages’.

     * @var string
     */
    public string $search_items;

    /**
     * Label used when no items are found. Default is ‘No posts found’ / ‘No pages found’.
     * @var string
     */
    public string $not_found;

    /**
     * Label used when no items are in the Trash. Default is ‘No posts found in Trash’ / ‘No pages found in Trash’.
     * @var string
     */
    public string $not_found_in_trash;

    /**
     * Label used to prefix parents of hierarchical items. Not used on non-hierarchical post types. Default is ‘Parent Page:’.
     * @var string
     */
    public string $parent_item_colon;

    /**
     * Label to signify all items in a submenu link. Default is ‘All Posts’ / ‘All Pages’.
     * @var string
     */
    public string $all_items;

    /**
     * Label for archives in nav menus. Default is ‘Post Archives’ / ‘Page Archives’.
     * @var string
     */
    public string $archives;

    /**
     * Label for the attributes meta box. Default is ‘Post Attributes’ / ‘Page
     * @var string
     */
    public string $attributes;

    /**
     * Label for the media frame button. Default is ‘Insert into post’ / ‘Insert into page’.
     * @var string
     */
    public string $insert_into_item;

    /**
     * Label for the media frame filter. Default is ‘Uploaded to this post’ / ‘Uploaded to this page’.
     * @var string
     */
    public string $uploaded_to_this_item;

    /**
     * Label for the featured image meta box title. Default is ‘Featured image’.
     * @var string
     */
    public string $featured_image;

    /**
     * Label for setting the featured image. Default is ‘Set featured image’.
     * @var string
     */
    public string $set_featured_image;

    /**
     * Label for removing the featured image. Default is ‘Remove featured image’.
     * @var string
     */
    public string $remove_featured_image;

    /**
     * Label in the media frame for using a featured image. Default is ‘Use as featured image’.
     * @var string
     */
    public string $use_featured_image;

    /**
     * Label for the menu name. Default is the same as name.
     * @var string
     */
    public string $menu_name;

    /**
     *  Label for the table views hidden heading. Default is ‘Filter posts list’ / ‘Filter pages list’.
     * @var string
     */
    public string $filter_items_list;

    /**
     * Label for the date filter in list tables. Default is ‘Filter by date’.
     * @var string
     */
    public string $filter_by_date;

    /**
     * Label for the table pagination hidden heading. Default is ‘Posts list navigation’ / ‘Pages list navigation’.
     * @var string
     */
    public string $items_list_navigation;

    /**
     * Label for the table hidden heading. Default is ‘Posts list’ / ‘Pages list’.
     * @var string
     */
    public string $items_list;

    /**
     * Label used when an item is published. Default is ‘Post published.’ / ‘Page published.’
     * @var string
     */
    public string $item_published;

    /**
     * Label used when an item is published with private visibility. Default is ‘Post published privately.’ / ‘Page published privately.’
     * @var string
     */
    public string $item_published_privately;

    /**
     * Label used when an item is switched to a draft. Default is ‘Post reverted to draft.’ / ‘Page reverted to draft.’
     * @var string
     */
    public string $item_reverted_to_draft;

    /**
     * Label used when an item is scheduled for publishing. Default is ‘Post scheduled.’ / ‘Page scheduled.’
     * @var string
     */
    public string $item_scheduled;

    /**
     * Label used when an item is updated. Default is ‘Post updated.’ / ‘Page updated.’
     * @var string
     */
    public string $item_updated;

    /**
     * Title for a navigation link block variation. Default is ‘Post Link’ / ‘Page Link’.
     * @var string
     */
    public string $item_link;
    /**
     * Description for a navigation link block variation. Default is ‘A link to a post.’ / ‘A link to a page.’
     * @var string
     */
    public string $item_link_description;
}
