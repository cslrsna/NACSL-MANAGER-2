<?php
namespace NACSL\Services\Interfaces;

interface IStartupService
{
    public static function Init():void;
    public static function Activate():void;
    public static function Deactivate():void;
}