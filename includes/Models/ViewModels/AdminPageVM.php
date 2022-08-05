<?php
namespace NACSL\Models\ViewModels;

abstract class AdminPageVM implements IViewModel
{
    public string $title;
    public string $subTitle;
    public string $description;
    public string $content;
}
