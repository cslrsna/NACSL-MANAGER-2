<?php
namespace NACSL\Controllers;

use NACSL\Services\ITaxService;

class TaxJours extends CustomTaxonomy
{
    public function AdminMenu(): void { }

    public function Options(): void { }

    public function AdminHook(): void { }

    public function PublicHook(): void { }
}
