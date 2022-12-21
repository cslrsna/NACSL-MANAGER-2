<?php
namespace NACSL\Models;

use NACSL\Models\ViewModels\AdminPageVM;

abstract class AdminPage
{
    public AdminPageVM $viewModel;
    public string $title;
    public string $menuTitle;
    public string $capability;
    public string $menuSlug;
    public string $icon;
    public int $position;
}