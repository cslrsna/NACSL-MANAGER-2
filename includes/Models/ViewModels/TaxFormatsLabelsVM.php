<?php
namespace NACSL\Models\ViewModels;

use NACSL\Utilities\AppConstants;

class TaxFormatsLabelsVM extends TaxLabelsVM
{
    public function __construct()
    {
        $td = AppConstants::TEXT_DOMAIN;
        $this->name =                       __("Formats de réunion", $td);
        $this->singular_name =              __("Format de réunion", $td);
        $this->search_items =               __("Recherche par format", $td);
        $this->popular_items =              __("Formats populaires", $td);
        $this->all_items =                  __("Tous les formats", $td);
        $this->parent_item =                __("Tous les formats parents", $td);
        $this->parent_item_colon =          __("Formats parents", $td);
        //$this->name_field_description =     __("Le nom affiché sur le site", $td);
        //$this->slug_field_description =     __("Le 'slug' est l'adresse du nom. Il est généralement entièrement en minuscules et ne contient que des lettres, des chiffres et des tirets", $td);
        //$this->parent_field_description =   __("Formats", $td);
        //$this->desc_field_description =     __("Formats", $td);
        $this->edit_item =                  __("Modifier le format", $td);
        $this->view_item =                  __("Afficher le format", $td);
        $this->update_item =                __("Mise à format", $td);
        $this->add_new_item =               __("Ajouter un format", $td);
        $this->new_item_name =              __("Nouveau format", $td);
        //$this->separate_items_with_commas = __("Formats", $td);
        $this->add_or_remove_items =        __("Ajouter ou retirer un format.", $td);
        $this->choose_from_most_used =      __("Choisir un format parmi les plus populaires", $td);
        $this->not_found =                  __("Format non-trouvé", $td);
        $this->no_terms =                   __("Terme introuvable", $td);
        $this->filter_by_item =             __("Filtrer par format", $td);
        $this->items_list_navigation =      __("Pagination des formats", $td);
        $this->items_list =                 __("Liste des formats", $td);
        $this->most_used =                  __("Format le plus utilisé", $td);
        $this->back_to_items =              __("Retour en arrière", $td);
        $this->item_link =                  __("Hyperlien du format", $td);
        $this->item_link_description =      __("Hyperlien vers le format", $td);
    }
    
}
