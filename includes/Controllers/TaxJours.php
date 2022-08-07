<?php
namespace NACSL\Controllers;

use NACSL\Services\ITaxService;
 
/**
 * Taxonomy "Jours" is a day tag for NACSL\Controllers\CptMettings
 * @package NACSL\Controllers
 */
class TaxJours extends CustomTaxonomy
{
    public function AdminMenu(): void { }

    public function Options(): void { }

    public function AdminHook(): void { }

    public function PublicHook(): void { }
}
