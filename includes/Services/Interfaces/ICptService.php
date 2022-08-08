<?php
namespace NACSL\Services\Interfaces;

use NACSL\Models\CustomPostType;

interface ICptService
{
    public function GetModel(string $name):CustomPostType;
}