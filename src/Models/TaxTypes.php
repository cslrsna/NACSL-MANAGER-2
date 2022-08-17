<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\TaxLabelsVM;
use NACSL\Utilities\AppConstants;

class TaxTypes extends CustomTaxonomy
{
    public function __construct(string $name, TaxLabelsVM $labels)
    {
        parent::__construct($name, $labels);
        $this->description = __("Types de réunions de NArcotiques Anononymes", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "types";
        $this->rewrite['slug'] = 'types';
    }    
}
