<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\CptLabelsVM;
use NACSL\Utilities\AppConstants;

/**
 * Representation of all arguments that wordpress need to build the Groups custom post type.
 * @see https://developer.wordpress.org/reference/functions/register_post_type/
 * @package NACSL\Models
 */
class CptGroups extends CustomPostType
{
    public function __construct(string $name, CptLabelsVM $labels)
    {
        parent::__construct($name, $labels);
        $this->description = __("Groupes faisant partie de Narcotique Anonymes.", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "groupes";
        $this->menu_position = -11;
        $this->rewrite['slug'] = 'groupes';
    }    
}
