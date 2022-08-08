<?php
namespace NACSL\Controllers;

use NACSL\Services\AuthorizationService;
use NACSL\Services\ITaxService;
use NACSL\Utilities\AppConstants;

/**
 * Taxonomy "Jours" is a day tag for NACSL\Controllers\CptMettings
 * @package NACSL\Controllers
 */
class TaxJours extends CustomTaxonomy
{
    private string $_optShowMenu;

    public function __construct(ITaxService $taxServ, array|string $objType)
    {
        parent::__construct($taxServ, $objType);
        $this->_optShowMenu = $this->model->taxonomy . "_opt_show_menu";
    }

    public function AdminHook(): void 
    {
        parent::AdminHook();
    }

    public function Options(): void 
    { 
        parent::Options();
    }

    public function AdminMenu(): void
    {
    }
}
