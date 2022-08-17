<?php
namespace NACSL\Models\ViewModels;

use NACSL\Utilities\AppConstants;

class TaxCitiesLabelsVM extends TaxLabelsVM
{
    public function __construct()
    {
        $td = AppConstants::TEXT_DOMAIN;
        $this->name =                       __("Villes", $td);
        $this->singular_name =              __("Ville", $td);
        $this->search_items =               __("Recherche par ville", $td);
        $this->popular_items =              __("Villes populaires", $td);
        $this->all_items =                  __("Toutes les villes", $td);
        $this->parent_item =                __("Toutes les villes parentes", $td);
        $this->parent_item_colon =          __("Villes parentes", $td);
        //$this->name_field_description =     __("Le nom affiché sur le site", $td);
        //$this->slug_field_description =     __("Le 'slug' est l'adresse du nom. Il est généralement entièrement en minuscules et ne contient que des lettres, des chiffres et des tirets", $td);
        //$this->parent_field_description =   __("Villes", $td);
        //$this->desc_field_description =     __("Villes", $td);
        $this->edit_item =                  __("Modifier la ville", $td);
        $this->view_item =                  __("Afficher la ville", $td);
        $this->update_item =                __("Mise à ville", $td);
        $this->add_new_item =               __("Ajouter une ville", $td);
        $this->new_item_name =              __("Nouvelle ville", $td);
        //$this->separate_items_with_commas = __("Villes", $td);
        $this->add_or_remove_items =        __("Ajouter ou retirer une ville.", $td);
        $this->choose_from_most_used =      __("Choisir une ville parmi les plus populaires", $td);
        $this->not_found =                  __("Ville non-trouvée", $td);
        $this->no_terms =                   __("Terme introuvable", $td);
        $this->filter_by_item =             __("Filtrer par ville", $td);
        $this->items_list_navigation =      __("Pagination des villes", $td);
        $this->items_list =                 __("Liste des villes", $td);
        $this->most_used =                  __("Ville la plus utilisée", $td);
        $this->back_to_items =              __("Retour en arrière", $td);
        $this->item_link =                  __("Hyperlien de la ville", $td);
        $this->item_link_description =      __("Hyperlien vers la ville", $td);
    }
    
}
