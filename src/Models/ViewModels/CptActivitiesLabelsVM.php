<?php
namespace NACSL\Models\ViewModels;

use NACSL\Utilities\AppConstants;

class CptActivitiesLabelsVM extends CptLabelsVM
{
    public function __construct()
    {
        $td = AppConstants::TEXT_DOMAIN;
        $this->name = __( "Activités du CSL" , $td);
        $this->singular_name = __( "Activité" , $td);
        $this->add_new = __( "Ajouter un activité" , $td);
        $this->add_new_item = __( "Ajouter une nouvelle activité" , $td);
        $this->edit_item = __( "Modifier le activité" , $td);
        $this->new_item = __( "Nouvelle activité" , $td);
        $this->view_item = __( "Voir le activité" , $td);
        $this->view_items = __( "Voir les activités" , $td);
        $this->search_items = __( "Recherche de activités" , $td);
        $this->not_found = __( "Aucune activité trouvée" , $td);
        $this->not_found_in_trash = __( "Aucune activité trouvée dans la corbeil" , $td);
        $this->parent_item_colon = __( "Activité parente" , $td);
        $this->all_items = __( "Toutes les activités" , $td);
        $this->archives = __( "Liste des activités" , $td);
        $this->attributes = __( "Attributs d'activités" , $td);
        $this->insert_into_item = __( "Insérer dans l'activité" , $td);
        $this->uploaded_to_this_item = __( "Téléversé à cette activité" , $td);
        $this->featured_image = __( "Image d'entête" , $td);
        $this->set_featured_image = __( "Définir l'image d'entête" , $td);
        $this->remove_featured_image = __( "Retirer l'image d'entête" , $td);
        $this->use_featured_image = __( "Utiliser comme image d'entête" , $td);
        $this->menu_name = __( "Activités" , $td);
        $this->filter_items_list = __( "Filtrer la liste" , $td);
        $this->filter_by_date = __( "Filtrer par date" , $td);
        $this->items_list_navigation = __( "Navigation liste de activités" , $td);
        $this->items_list = __( "Liste de activités" , $td);
        $this->item_published = __( "Activité publiée" , $td);
        $this->item_published_privately = __( "Activité publiée en privé" , $td);
        $this->item_reverted_to_draft = __( "Activité en mode brouillon" , $td);
        $this->item_scheduled = __( "Date de publication" , $td);
        $this->item_updated = __( "Mise à jour" , $td);
        $this->item_link = __( "Hyperlien du activité" , $td);
        $this->item_link_description = __( "Lien vers une activité" , $td);
    }

    public function ToArray()
    {
        return (array) $this;
    }
    
}
