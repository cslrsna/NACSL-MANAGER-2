<?php

namespace NACSL\Models\ViewModels;

/**
 * Representation of all labels that wordpress need to build a custom taxonomy.
 * @package NACSL\Models\ViewModels
 */
abstract class TaxLabelsVM implements IViewModel
{
    /**
     * General name for the taxonomy, usually plural. The same as and overridden by $tax->label. Default 'Tags'/'Categories'.
     * @var string
     */
    public string $name;

    /**
     * Name for one object of this taxonomy. Default 'Tag'/'Category'.
     * @var string
     */
    public string $singular_name;

    /**
     * Default 'Search Tags'/'Search Categories'.
     * @var string
     */
    public string $search_items;

    /**
     *  This label is only used for non-hierarchical taxonomies. Default 'Popular Tags'.
     * @var string
     */
    public string $popular_items;

    /**
     * Default 'All Tags'/'All Categories'.
     * @var string
     */
    public string $all_items;

    /**
     * Default 'All Tags'/'All Categories'.
     * @var string
     */
    public string $parent_item;

    /**
     * The same as parent_item, but with colon : in the end.
     * @var string
     */                 
    public string $parent_item_colon; 
    
    /**
     * Description for the Name field on Edit Tags screen. Default 'The name is how it appears on your site'.
     * @var string
     */
    public string $name_field_description;

    /**
     *  Description for the Slug field on Edit Tags screen. Default 'The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens'.
     * @var string
     */
    public string $slug_field_description;

    /**
     * Description for the Parent field on Edit Tags screen. Default 'Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band'.
     * @var string
     */
    public string $parent_field_description;

    /**
     * Description for the Description field on Edit Tags screen. Default 'The description is not prominent by default; however, some themes may show it'.
     * @var string
     */
    public string $desc_field_description;

    /**
     * Default 'Edit Tag'/'Edit Category'.
     * @var string
     */
    public string $edit_item;

    /**
     * Default 'View Tag'/'View Category'.
     * @var string
     */
    public string $view_item;

    /**
     * Default 'Update Tag'/'Update Category'.
     * @var string
     */
    public string $update_item;

    /**
     *  Default 'Add New Tag'/'Add New Category'.
     * @var string
     */
    public string $add_new_item;

    /**
     * Default 'New Tag Name'/'New Category Name'.
     * @var string
     */
    public string $new_item_name;

    /**
     * This label is only used for non-hierarchical taxonomies. Default 'Separate tags with commas', used in the meta box.
     * @var string
     */
    public string $separate_items_with_commas;

    /**
     * This label is only used for non-hierarchical taxonomies. Default 'Add or remove tags', used in the meta box when JavaScript is disabled.
     * @var string
     */
    public string $add_or_remove_items;

    /**
     * This label is only used on non-hierarchical taxonomies. Default 'Choose from the most used tags', used in the meta box.
     * @var string
     */
    public string $choose_from_most_used;

    /**
     * Default 'No tags found'/'No categories found', used in the meta box and taxonomy list table.
     * @var string
     */
    public string $not_found;

    /**
     * Default 'No tags'/'No categories', used in the posts and media list tables.
     * @var string
     */
    public string $no_terms;

    /**
     * This label is only used for hierarchical taxonomies. Default 'Filter by category', used in the posts list table.
     * @var string
     */
    public string $filter_by_item;

    /**
     * Label for the table pagination hidden heading.
     * @var string
     */
    public string $items_list_navigation;

    /**
     * Label for the table hidden heading.
     * @var string
     */
    public string $items_list;

    /**
     * Title for the Most Used tab. Default 'Most Used'.
     * @var string
     */
    public string $most_used;

    /**
     * Label displayed after a term has been updated.
     * @var string
     */
    public string $back_to_items;

    /**
     * Used in the block editor. Title for a navigation link block variation. Default 'Tag Link'/'Category Link'.
     * @var string
     */
    public string $item_link;

    /**
     * Used in the block editor. Description for a navigation link block variation. Default 'A link to a tag'/'A link to a category.'
     * @var string
     */
    public string $item_link_description;

    /**
     * Return this object as an array as wordpress expected it. If properity value is null, the value will has the default value from wordpress system.
     * @return array 
     */
    public function ToArray()
    {
        return (array) $this;
    }
}
