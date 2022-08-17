<?php
namespace NACSL\Utilities\Interfaces;

use NACSL\Utilities\EnumSettingFieldInputType;
use NACSL\Utilities\EnumSettingFieldType;

interface IAdminSettingPage
{
    public function AddField( string $id, string $title, EnumSettingFieldInputType $inputType, string $section='default', array $attr, EnumSettingFieldType $type):void;
    public function AddSection(string $suffixId, string $title):void;
    public function Factory():void;
}