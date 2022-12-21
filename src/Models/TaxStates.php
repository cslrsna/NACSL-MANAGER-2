<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\TaxLabelsVM;
use NACSL\Utilities\AppConstants;

class TaxStates extends CustomTaxonomy
{
    public function __construct(string $name, TaxLabelsVM $labels)
    {
        parent::__construct($name, $labels);
        $this->description = __("États de réunions de Narcotiques Anononymes", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "etats";
        $this->rewrite['slug'] = 'etats';
    }    
}
