<?php
namespace NACSL\Services;

use NACSL\Models\CustomPostType as CptModel;
use NACSL\Services\Interfaces\ICptService;
use NACSL\Utilities\AdminSettingPage;
use NACSL\Utilities\EnumSettingFieldInputType;
use NACSL\Utilities\EnumSettingFieldType;
use Timber\Timber;

class CptService implements ICptService
{

    public function GetModelData(string $name):CptModel 
    { 
        $modelName = "NACSL\Models\\$name";
        $viewLabelModel = "NACSL\Models\ViewModels\\{$name}LabelsVM";
        $model = new $modelName($name, new $viewLabelModel );
        $model->option_group = $model->post_type . "_opt";
        return $model;
    }
    
    public function BuildSubmenuOptions( string $view, CptModel $model):void
    {
        $option_group = $model->option_group;

        add_submenu_page(
            "edit.php?post_type=" . $model->post_type, 
            "Options des " . $model->labels->name, 
            "Options", 
            "manage_options",
            $option_group,
            function() use($view, $option_group){
                Timber::render($view, ['option_group' => $option_group]);                
            }
        );     
    }

    /**
     * Show taxonomies submenu
     * @param string $post_type 
     * @param array $taxonomies 
     * @return void 
     */
    public function ShowTaxSubmenuOptions(string $post_type, array $taxonomies):void
    {
        foreach ($taxonomies as $tax) {
            if( !$tax['showSubmenu'] ){
                remove_submenu_page("edit.php?post_type=$post_type", "edit-tags.php?taxonomy={$tax['taxonomy']}&amp;post_type=$post_type");
            }
        }        
    }

    /**
     * Get taxonomies array for admin option page.
     * @key [option_group] => Slug admin page
     * @key [fields] => array of taxonomy option field
     * @key [fields][taxonomy] => Taxonomy slug
     * @key [fields][id] => Setting field slug
     * @key [fields][title] => Setting field title
     * @key [fields][showSubmenu] => Setting field option slug
     * @param string $post_type 
     * @return mixed 
     */
    public function GetTaxOptions (string $post_type):mixed
    {
        $option_group = $post_type . "_opt";
        $showTaxId = $option_group . "_show_";

        return array(
            'option_group' => $option_group,
            'fields' => array_map( 
                fn($tax) => array(
                    'taxonomy' => $tax,
                    'id' => $showTaxId . end(explode("_",$tax)),
                    'title' => get_taxonomy_labels(get_taxonomy($tax))->name,
                    'showSubmenu' => get_option($showTaxId . end(explode("_",$tax))),
                ), 
                get_object_taxonomies($post_type)
            )
        );
    }

    /**
     * Taxonomies settings builder
     * @param array $options NACSL\Services\CptService::GetTaxOptions()
     * @return void 
     */
    public function TaxOptionsFactory(array $options):void
    {
        $optGroup = new AdminSettingPage($options['option_group']);

        $sectionId = "categories";        
        $optGroup->AddSection($sectionId, "Afficher les taxonomies");

        foreach ($options['fields'] as $field) {            
            $optGroup->AddField(
                id: $field['id'], 
                title:  $field['title'], 
                section:$sectionId,
                inputType:EnumSettingFieldInputType::CHECKBOX,
                type: EnumSettingFieldType::BOOLEAN
            );
        }

        $optGroup->Factory(); 
    }

}
