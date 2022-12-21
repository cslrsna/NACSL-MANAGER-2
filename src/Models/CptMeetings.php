<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\CptLabelsVM;
use NACSL\Utilities\AppConstants;

/**
 * Representation of all arguments that wordpress need to build the meetings custom post type.
 * @see https://developer.wordpress.org/reference/functions/register_post_type/
 * @package NACSL\Models
 */
class CptMeetings extends CustomPostType
{
    public function __construct(string $name, CptLabelsVM $labels)
    {
        parent::__construct($name, $labels);
        $this->description = __("Réunions faisant partie de Narcotique Anonymes.", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "reunions";
        $this->menu_position = -1;
        $this->rewrite['slug'] = 'reunions';
    }    
}
