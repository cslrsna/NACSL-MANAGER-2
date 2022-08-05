<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\CptLabelsVm;
use NACSL\Utilities\AppConstants;

class CptMeetings extends CustomPostType
{
    public function __construct(string $name, CptLabelsVm $labels)
    {
        $this->name = AppConstants::PREFIX . $name;
        $this->labels = $labels;
        $this->description = __("Réunions faisant partie de Narcotique Anonymes.", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "reunions";
        $this->menu_position = -10;
        $this->menu_icon = AppConstants::$adminUrl . "images/logo-na.svg";
        $this->rewrite['slug'] = 'reunions';
    }    
}
