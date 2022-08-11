<?php
namespace NACSL\Services\Interfaces;

use NACSL\Models\CustomPostType;

interface ICptService
{
    public function GetModelData(string $name):CustomPostType;
    public function GetTaxSubmenuOptions( string $view, CustomPostType $model):void;
    public function ShowTaxSubmenuOptions(string $post_type, array $taxonomies):void;
    public function GetTaxOptions (string $post_type):mixed;
    public function TaxOptionsFactory(array $options):void;
}