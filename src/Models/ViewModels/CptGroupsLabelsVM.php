<?php
namespace NACSL\Models\ViewModels;

use NACSL\Utilities\AppConstants;

class CptGroupsLabelsVM extends CptLabelsVM
{
    public function __construct()
    {
        $td = AppConstants::TEXT_DOMAIN;
        $this->name = __( "Groupes du CSL" , $td);
        $this->singular_name = __( "Groupe" , $td);
        $this->add_new = __( "Ajouter un groupe" , $td);
        $this->add_new_item = __( "Ajouter un nouveau groupe" , $td);
        $this->edit_item = __( "Modifier le groupe" , $td);
        $this->new_item = __( "Nouveau groupe" , $td);
        $this->view_item = __( "Voir le groupe" , $td);
        $this->view_items = __( "Voir les groupes" , $td);
        $this->search_items = __( "Recherche de groupes" , $td);
        $this->not_found = __( "Aucun groupe trouvé" , $td);
        $this->not_found_in_trash = __( "Aucun groupe trouvé dans la corbeil" , $td);
        $this->parent_item_colon = __( "Groupe parent" , $td);
        $this->all_items = __( "Tous les groupes" , $td);
        $this->archives = __( "Liste des groupes" , $td);
        $this->attributes = __( "Attributs de groupes" , $td);
        $this->insert_into_item = __( "Insérer dans le groupe" , $td);
        $this->uploaded_to_this_item = __( "Téléversé à ce groupe" , $td);
        $this->featured_image = __( "Image d'entête" , $td);
        $this->set_featured_image = __( "Définir l'image d'entête" , $td);
        $this->remove_featured_image = __( "Retirer l'image d'entête" , $td);
        $this->use_featured_image = __( "Utiliser comme image d'entête" , $td);
        $this->menu_name = __( "Groupes" , $td);
        $this->filter_items_list = __( "Filtrer la liste" , $td);
        $this->filter_by_date = __( "Filtrer par date" , $td);
        $this->items_list_navigation = __( "Navigation liste de groupes" , $td);
        $this->items_list = __( "Liste de groupes" , $td);
        $this->item_published = __( "Groupe publié" , $td);
        $this->item_published_privately = __( "Groupe publié en privé" , $td);
        $this->item_reverted_to_draft = __( "Groupe en mode brouillon" , $td);
        $this->item_scheduled = __( "Date de publication" , $td);
        $this->item_updated = __( "Mise à jour" , $td);
        $this->item_link = __( "Hyperlien du groupe" , $td);
        $this->item_link_description = __( "Lien vers un groupe" , $td);
    }

    public function ToArray()
    {
        return (array) $this;
    }
    
}
