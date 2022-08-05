<?php
namespace NACSL\Services;

use NACSL\Models\CustomPostType;

interface ICptService
{
    public function GetModel(string $name):CustomPostType;
}