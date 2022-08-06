<?php

namespace NACSL\Models\ViewModels;

abstract class TaxLabelsVM implements IViewModel
{
    public string $name;
    public string $singular_name;
    public string $search_items;
    public string $popular_items;
    public string $parent_item;
    public string $parent_item_colon;
    public string $name_field_description;
    public string $slug_field_description;
    public string $parent_field_description;
    public string $desc_field_description;
    public string $edit_item;
    public string $view_item;
    public string $update_item;
    public string $add_new_item;
    public string $new_item_name;
    public string $separate_items_with_commas;
    public string $add_or_remove_items;
    public string $choose_from_most_used;
    public string $not_found;
    public string $no_terms;
    public string $filter_by_item;
    public string $items_list_navigation;
    public string $items_list;
    public string $most_used;
    public string $back_to_items;
    public string $item_link;
    public string $item_link_description;
}
