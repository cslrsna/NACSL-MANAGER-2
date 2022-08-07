<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\CptLabelsVM;
use NACSL\Utilities\AppConstants;

/**
 * Representation of all arguments that wordpress need to build the sub-comitee custom post type.
 * @see https://developer.wordpress.org/reference/functions/register_post_type/
 * @package NACSL\Models
 */
class CptSubCom extends CustomPostType
{
    public function __construct(string $name, CptLabelsVM $labels)
    {
        parent::__construct($name, $labels);
        $this->description = __("Sous-comités faisant partie de Narcotique Anonymes.", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "sous-comites";
        $this->menu_position = -12;
        $this->rewrite['slug'] = 'sous-comites';
    }    
}
