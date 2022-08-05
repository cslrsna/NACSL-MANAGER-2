<?php
namespace NACSL\Models\ViewModels;

use NACSL\Utilities\AppConstants;

class CptMeetingsLabelsVM extends CptLabelsVm
{
    public function __construct()
    {
        $this->name = __("Réunions du CSL", AppConstants::TEXT_DOMAIN);
        $this->menu_name = __("Réunions", AppConstants::TEXT_DOMAIN);
        $this->singular_name = __("Réunion", AppConstants::TEXT_DOMAIN);
        $this->add_new = __("Ajouter une réunion", AppConstants::TEXT_DOMAIN);
        $this->add_new_item = __("Ajouter une nouvelle réunion", AppConstants::TEXT_DOMAIN);
        $this->edit_item = __("Modifier la réunion", AppConstants::TEXT_DOMAIN);
        $this->new_item = __("Nouvelle réunion", AppConstants::TEXT_DOMAIN);
        $this->view_item = __("Voir ls réunion", AppConstants::TEXT_DOMAIN);
        $this->view_items = __("Voir les réunions", AppConstants::TEXT_DOMAIN);
        $this->search_items = __("Recherche de réunions", AppConstants::TEXT_DOMAIN);
        $this->not_found = __("Aucune réunion trouvée", AppConstants::TEXT_DOMAIN);
        $this->not_found_in_trash = __("Aucune réunion trouvée dans la corbeil", AppConstants::TEXT_DOMAIN);
        $this->parent_item_colon = __("Réunion parente", AppConstants::TEXT_DOMAIN);
        $this->all_items = __("Tous les réunions", AppConstants::TEXT_DOMAIN);
        $this->archives = __("Liste des réunions", AppConstants::TEXT_DOMAIN);
        $this->attributes = __("Attributs de réunions", AppConstants::TEXT_DOMAIN);
        $this->insert_into_item = __("Insérer dans la réunion", AppConstants::TEXT_DOMAIN);
        $this->uploaded_to_this_item = __("Téléversé à cette réunion", AppConstants::TEXT_DOMAIN);
        $this->featured_image = __("Image d'entête", AppConstants::TEXT_DOMAIN);
        $this->set_featured_image = __("Définir l'image d'entête", AppConstants::TEXT_DOMAIN);
        $this->remove_featured_image = __("Retirer l'image d'entête", AppConstants::TEXT_DOMAIN);
        $this->use_featured_image = __("Utiliser comme image d'entête", AppConstants::TEXT_DOMAIN);
        $this->filter_items_list = __("Filtrer la liste", AppConstants::TEXT_DOMAIN);
        $this->filter_by_date = __("Filtrer par date", AppConstants::TEXT_DOMAIN);
        $this->items_list_navigation = __("Navigation liste de réunions", AppConstants::TEXT_DOMAIN);
        $this->items_list = __("Liste de réunions", AppConstants::TEXT_DOMAIN);
        $this->item_published = __("Réunion publiée", AppConstants::TEXT_DOMAIN);
        $this->item_published_privately = __("Réunion privée", AppConstants::TEXT_DOMAIN);
        $this->item_reverted_to_draft = __("Réunion en mode brouillon", AppConstants::TEXT_DOMAIN);
        $this->item_scheduled = __("Date de publication", AppConstants::TEXT_DOMAIN);
        $this->item_updated = __("Mise à jour", AppConstants::TEXT_DOMAIN);
        $this->item_link = __("Hyperlien de la réunion", AppConstants::TEXT_DOMAIN);
        $this->item_link_description = __("Lien vers une réunion", AppConstants::TEXT_DOMAIN);
    }

    public function ToArray()
    {
        return (array) $this;
    }
    
}
