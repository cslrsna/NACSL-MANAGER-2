<?php
namespace NACSL\Models\ViewModels;

use NACSL\Utilities\AppConstants;

class TaxTypesLabelsVM extends TaxLabelsVM
{
    public function __construct()
    {
        $td = AppConstants::TEXT_DOMAIN;
        $this->name =                       __("Types des réunion", $td);
        $this->singular_name =              __("Type des réunion", $td);
        $this->search_items =               __("Recherche par type", $td);
        $this->popular_items =              __("Types populaires", $td);
        $this->all_items =                  __("Tous les types", $td);
        $this->parent_item =                __("Tous les types parents", $td);
        $this->parent_item_colon =          __("Types parents", $td);
        //$this->name_field_description =     __("Le nom affiché sur le site", $td);
        //$this->slug_field_description =     __("Le 'slug' est l'adresse du nom. Il est généralement entièrement en minuscules et ne contient que des lettres, des chiffres et des tirets", $td);
        //$this->parent_field_description =   __("Types", $td);
        //$this->desc_field_description =     __("Types", $td);
        $this->edit_item =                  __("Modifier le type", $td);
        $this->view_item =                  __("Afficher le type", $td);
        $this->update_item =                __("Mise à type", $td);
        $this->add_new_item =               __("Ajouter un type", $td);
        $this->new_item_name =              __("Nouveau types", $td);
        //$this->separate_items_with_commas = __("Types", $td);
        $this->add_or_remove_items =        __("Ajouter ou retirer un types.", $td);
        $this->choose_from_most_used =      __("Choisir un type parmi les plus populaires", $td);
        $this->not_found =                  __("Type non-trouvé", $td);
        $this->no_terms =                   __("Terme introuvable", $td);
        $this->filter_by_item =             __("Filtrer par types", $td);
        $this->items_list_navigation =      __("Pagination des types", $td);
        $this->items_list =                 __("Liste de types", $td);
        $this->most_used =                  __("Type le plus utilisé", $td);
        $this->back_to_items =              __("Retour en arrière", $td);
        $this->item_link =                  __("Hyperlien du type", $td);
        $this->item_link_description =      __("Hyperlien vers le type", $td);
    }
    
}
