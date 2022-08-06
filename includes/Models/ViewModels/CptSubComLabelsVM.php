<?php
namespace NACSL\Models\ViewModels;

use NACSL\Utilities\AppConstants;

class CptSubComLabelsVM extends CptLabelsVM
{
    public function __construct()
    {
        $this->name = __("Sous-comités du CSL", AppConstants::TEXT_DOMAIN);
        $this->menu_name = __("Sous-comités", AppConstants::TEXT_DOMAIN);
        $this->singular_name = __("Sous-comité", AppConstants::TEXT_DOMAIN);
        $this->add_new = __("Ajouter un sous-comité", AppConstants::TEXT_DOMAIN);
        $this->add_new_item = __("Ajouter un nouveau sous-comité", AppConstants::TEXT_DOMAIN);
        $this->edit_item = __("Modifier le sous-comité", AppConstants::TEXT_DOMAIN);
        $this->new_item = __("Nouveau sous-comité", AppConstants::TEXT_DOMAIN);
        $this->view_item = __("Voir le sous-comité", AppConstants::TEXT_DOMAIN);
        $this->view_items = __("Voir les sous-comités", AppConstants::TEXT_DOMAIN);
        $this->search_items = __("Recherche de sous-comités", AppConstants::TEXT_DOMAIN);
        $this->not_found = __("Aucun sous-comité trouvé", AppConstants::TEXT_DOMAIN);
        $this->not_found_in_trash = __("Aucun sous-comité trouvé dans la corbeil", AppConstants::TEXT_DOMAIN);
        $this->parent_item_colon = __("Sous-comité parent", AppConstants::TEXT_DOMAIN);
        $this->all_items = __("Tous les sous-comités", AppConstants::TEXT_DOMAIN);
        $this->archives = __("Liste des sous-comités", AppConstants::TEXT_DOMAIN);
        $this->attributes = __("Attributs de sous-comités", AppConstants::TEXT_DOMAIN);
        $this->insert_into_item = __("Insérer dans le sous-comité", AppConstants::TEXT_DOMAIN);
        $this->uploaded_to_this_item = __("Téléversé à ce sous-comité", AppConstants::TEXT_DOMAIN);
        $this->featured_image = __("Image d'entête", AppConstants::TEXT_DOMAIN);
        $this->set_featured_image = __("Définir l'image d'entête", AppConstants::TEXT_DOMAIN);
        $this->remove_featured_image = __("Retirer l'image d'entête", AppConstants::TEXT_DOMAIN);
        $this->use_featured_image = __("Utiliser comme image d'entête", AppConstants::TEXT_DOMAIN);
        $this->filter_items_list = __("Filtrer la liste", AppConstants::TEXT_DOMAIN);
        $this->filter_by_date = __("Filtrer par date", AppConstants::TEXT_DOMAIN);
        $this->items_list_navigation = __("Navigation liste de sous-comités", AppConstants::TEXT_DOMAIN);
        $this->items_list = __("Liste de sous-comités", AppConstants::TEXT_DOMAIN);
        $this->item_published = __("Sous-comité publié", AppConstants::TEXT_DOMAIN);
        $this->item_published_privately = __("Sous-comité privé", AppConstants::TEXT_DOMAIN);
        $this->item_reverted_to_draft = __("Sous-comité en mode brouillon", AppConstants::TEXT_DOMAIN);
        $this->item_scheduled = __("Date de publication", AppConstants::TEXT_DOMAIN);
        $this->item_updated = __("Mise à jour", AppConstants::TEXT_DOMAIN);
        $this->item_link = __("Hyperlien de la sous-comité", AppConstants::TEXT_DOMAIN);
        $this->item_link_description = __("Lien vers un sous-comité", AppConstants::TEXT_DOMAIN);
    }

    public function ToArray()
    {
        return (array) $this;
    }
    
}
