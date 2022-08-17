<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\TaxLabelsVM;
use NACSL\Utilities\AppConstants;

class TaxJours extends CustomTaxonomy
{
    public function __construct(string $name, TaxLabelsVM $labels)
    {
        parent::__construct($name, $labels);
        $this->description = __("Jours de semaine.", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "jours";
        $this->rewrite['slug'] = 'jours';
    }
        
}
