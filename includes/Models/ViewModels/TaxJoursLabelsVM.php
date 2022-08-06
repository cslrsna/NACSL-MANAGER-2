<?php
namespace NACSL\Models\ViewModels;

use NACSL\Utilities\AppConstants;

class TaxJoursLabelsVM extends TaxLabelsVM
{
    public function __construct()
    {
        $this->name = '';
        $this->singular_name = '';
        $this->search_items = '';
        $this->popular_items = '';
        $this->parent_item = '';
        $this->parent_item_colon = '';
        $this->name_field_description = '';
        $this->slug_field_description = '';
        $this->parent_field_description = '';
        $this->desc_field_description = '';
        $this->edit_item = '';
        $this->view_item = '';
        $this->update_item = '';
        $this->add_new_item = '';
        $this->new_item_name = '';
        $this->separate_items_with_commas = '';
        $this->add_or_remove_items = '';
        $this->choose_from_most_used = '';
        $this->not_found = '';
        $this->no_terms = '';
        $this->filter_by_item = '';
        $this->items_list_navigation = '';
        $this->items_list = '';
        $this->most_used = '';
        $this->back_to_items = '';
        $this->item_link = '';
        $this->item_link_description = '';
    }

    public function ToArray()
    {
        return (array) $this;
    }
    
}
