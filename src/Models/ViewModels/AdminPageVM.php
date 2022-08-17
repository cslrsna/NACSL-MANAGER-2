<?php
namespace NACSL\Models\ViewModels;

use NACSL\Models\ViewModels\Interfaces\IViewModel;

abstract class AdminPageVM implements IViewModel
{
    public string $title;
    public string $subTitle;
    public string $description;
    public string $content;
}
