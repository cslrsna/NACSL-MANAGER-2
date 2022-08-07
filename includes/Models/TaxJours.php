<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\TaxLabelsVM;
use NACSL\Utilities\AppConstants;

class TaxJours extends CustomTaxonomy
{
    public function __construct(string $name, TaxLabelsVM $labels)
    {
        $this->taxonomy = strtolower(AppConstants::PREFIX . $name);
        $this->labels = $labels;
        $this->description = __("Groupes faisant partie de Narcotique Anonymes.", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "jours";
        //$this->menu_position = -11;
        $this->menu_icon = AppConstants::$adminUrl . "images/logo-na.svg";
        $this->rewrite['slug'] = 'jours';
    }    
}
