<?php
namespace NACSL\Services;

use Timber\Timber;

class CptMeetingsService
{
    public function GetOptionsMenu(string $cptSlug, string $title, string $menuSlug, array $options, array $data):void
    {
        $optionJours = get_option($options['jours']);
        $optionTypes = get_option($options['types']);
        $taxonomies = get_object_taxonomies($cptSlug);

        add_submenu_page(
            "edit.php?post_type=" . $cptSlug, 
            "Options des " . $title, 
            "Options", 
            "manage_options",
            $menuSlug,
            function() use($data){
                Timber::render('admin/form/AdminOptionsForm.twig', $data);                
            }
        );     
        
        foreach ($taxonomies as $tax) {
            $jours = str_contains(strtolower($tax), 'taxjours') && ! $optionJours;
            $type = str_contains(strtolower($tax), 'taxtype') && ! $optionTypes;
            if( $jours || $type ){
                remove_submenu_page("edit.php?post_type=$cptSlug", "edit-tags.php?taxonomy=$tax&amp;post_type=$cptSlug");
            }
        }
    }
}
