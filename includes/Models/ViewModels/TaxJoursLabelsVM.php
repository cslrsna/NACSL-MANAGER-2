<?php
namespace NACSL\Models\ViewModels;

use NACSL\Utilities\AppConstants;

class TaxJoursLabelsVM extends TaxLabelsVM
{
    public function __construct()
    {
        $td = AppConstants::TEXT_DOMAIN;
        $this->name =                       __("Jours", $td);
        $this->singular_name =              __("Jour", $td);
        $this->search_items =               __("Recherche par jour", $td);
        $this->popular_items =              __("Jours populaires", $td);
        $this->all_items =                  __("Tous les jours", $td);
        $this->parent_item =                __("Tous les jours parents", $td);
        $this->parent_item_colon =          __("Jours parents", $td);
        //$this->name_field_description =     __("Le nom affiché sur le site", $td);
        //$this->slug_field_description =     __("Le 'slug' est l'adresse du nom. Il est généralement entièrement en minuscules et ne contient que des lettres, des chiffres et des tirets", $td);
        //$this->parent_field_description =   __("Jours", $td);
        //$this->desc_field_description =     __("Jours", $td);
        $this->edit_item =                  __("Modifier le jour", $td);
        $this->view_item =                  __("Afficher le jour", $td);
        $this->update_item =                __("Mise à jour", $td);
        $this->add_new_item =               __("Ajouter un jour", $td);
        $this->new_item_name =              __("Nouveau jours", $td);
        //$this->separate_items_with_commas = __("Jours", $td);
        $this->add_or_remove_items =        __("Ajouter ou retirer un jours.", $td);
        $this->choose_from_most_used =      __("Choisir un jour parmi les plus populaires", $td);
        $this->not_found =                  __("Jour non-trouvé", $td);
        $this->no_terms =                   __("Terme introuvable", $td);
        $this->filter_by_item =             __("Filtrer par jours", $td);
        $this->items_list_navigation =      __("Pagination des jours", $td);
        $this->items_list =                 __("Liste de jours", $td);
        $this->most_used =                  __("Jour le plus utilisés", $td);
        $this->back_to_items =              __("Retour en arrière", $td);
        $this->item_link =                  __("Hyperlien du jour", $td);
        $this->item_link_description =      __("Hyperlien vers le jour", $td);
    }

    public function ToArray()
    {
        return (array) $this;
    }
    
}
