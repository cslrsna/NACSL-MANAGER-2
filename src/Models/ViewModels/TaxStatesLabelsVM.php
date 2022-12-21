<?php
namespace NACSL\Models\ViewModels;

use NACSL\Utilities\AppConstants;

class TaxStatesLabelsVM extends TaxLabelsVM
{
    public function __construct()
    {
        $td = AppConstants::TEXT_DOMAIN;
        $this->name =                       __("États de réunion", $td);
        $this->singular_name =              __("État de réunion", $td);
        $this->search_items =               __("Recherche par état", $td);
        $this->popular_items =              __("États populaires", $td);
        $this->all_items =                  __("Tous les états", $td);
        $this->parent_item =                __("Tous les états parents", $td);
        $this->parent_item_colon =          __("États parents", $td);
        //$this->name_field_description =     __("Le nom affiché sur le site", $td);
        //$this->slug_field_description =     __("Le 'slug' est l'adresse du nom. Il est généralement entièrement en minuscules et ne contient que des lettres, des chiffres et des tirets", $td);
        //$this->parent_field_description =   __("États", $td);
        //$this->desc_field_description =     __("États", $td);
        $this->edit_item =                  __("Modifier l'états", $td);
        $this->view_item =                  __("Afficher l'états", $td);
        $this->update_item =                __("Mise à jour", $td);
        $this->add_new_item =               __("Ajouter un état", $td);
        $this->new_item_name =              __("Nouvel état", $td);
        //$this->separate_items_with_commas = __("États", $td);
        $this->add_or_remove_items =        __("Ajouter ou retirer un état.", $td);
        $this->choose_from_most_used =      __("Choisir un état parmi les plus populaires", $td);
        $this->not_found =                  __("État non-trouvé", $td);
        $this->no_terms =                   __("Terme introuvable", $td);
        $this->filter_by_item =             __("Filtrer par état", $td);
        $this->items_list_navigation =      __("Pagination des états", $td);
        $this->items_list =                 __("Liste des états", $td);
        $this->most_used =                  __("État le plus utilisé", $td);
        $this->back_to_items =              __("Retour en arrière", $td);
        $this->item_link =                  __("Hyperlien de l'état", $td);
        $this->item_link_description =      __("Hyperlien vers l'état", $td);
    }
    
}
