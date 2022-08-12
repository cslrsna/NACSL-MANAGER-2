<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\TaxLabelsVM;
use NACSL\Utilities\AppConstants;

class TaxFormats extends CustomTaxonomy
{
    public function __construct(string $name, TaxLabelsVM $labels)
    {
        parent::__construct($name, $labels);
        $this->description = __("Formats de réunions de Narcotiques Anononymes", AppConstants::TEXT_DOMAIN);
        $this->rest_base = "formats";
        $this->rewrite['slug'] = 'formats';
    }    
}
