<?php
namespace NACSL\Services\Interfaces;

use NACSL\Models\CustomPostType;

interface ICptService
{
    public function GetModelData(string $name):CustomPostType;
}