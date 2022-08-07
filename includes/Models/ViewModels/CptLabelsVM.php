<?php

namespace NACSL\Models\ViewModels;

abstract class CptLabelsVM implements IViewModel
{
    public string $name;
    public string $menu_name;
    public string $singular_name;
    public string $add_new;
    public string $add_new_item;
    public string $edit_item;
    public string $new_item;
    public string $view_item;
    public string $view_items;
    public string $search_items;
    public string $not_found;
    public string $not_found_in_trash;
    public string $parent_item_colon;
    public string $all_items;
    public string $archives;
    public string $attributes;
    public string $insert_into_item;
    public string $uploaded_to_this_item;
    public string $featured_image;
    public string $set_featured_image;
    public string $remove_featured_image;
    public string $use_featured_image;
    public string $filter_items_list;
    public string $filter_by_date;
    public string $items_list_navigation;
    public string $items_list;
    public string $item_published;
    public string $item_published_privately;
    public string $item_reverted_to_draft;
    public string $item_scheduled;
    public string $item_updated;
    public string $item_link;
    public string $item_link_description;
}
