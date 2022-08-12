<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\CptLabelsVM;
use NACSL\Utilities\AppConstants;

/**
 * Representation of all arguments that wordpress need to build the Groups custom post type.
 * @see https://developer.wordpress.org/reference/functions/register_post_type/
 * @package NACSL\Models
 */
class CptActivities extends CustomPostType
{
    public function __construct(string $name, CptLabelsVM $labels)
    {
        parent::__construct($name, $labels);
        $this->description = __("Activités de Narcotique Anonymes.", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "activites";
        $this->menu_position = -2;
        $this->rewrite['slug'] = 'activites';
    }    
}
