<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\TaxLabelsVM;
use NACSL\Utilities\AppConstants;

class TaxCities extends CustomTaxonomy
{
    public function __construct(string $name, TaxLabelsVM $labels)
    {
        parent::__construct($name, $labels);
        $this->description = __("Villes de l'adresse physique", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "villes";
        $this->rewrite['slug'] = 'villes';
    }    
}
