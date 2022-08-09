<?php
namespace NACSL\Utilities\Interfaces;

use NACSL\Utilities\EnumSettingFieldType;

interface IAdminSettingPageFactory
{
    public function AddField( string $id, string $title, EnumSettingFieldType $type, string $section='default'):void;
    public function AddSection(string $id, string $title):void;
    public function BuildPage():void;public function SelectInputView(EnumSettingFieldType $type, string $id, $option, array $attr = null):void;
}