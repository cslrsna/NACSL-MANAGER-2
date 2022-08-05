<?php

namespace NACSL\Models\ViewModels;

use NACSL\Utilities\EnumAdminNoticeType;

class AdminNoticeVM implements IViewModel
{

    public string $logoPath;
    public string $logoAlt;
    public string $noticeType;
    public array $heading;
    public string $content;
    public bool $isDismissible = false;
    
    public function __construct(string $logoPath, EnumAdminNoticeType $noticeType,string $pluginName, string $title, string $description, string $content, bool $isDismissible = true)
    {
        $this->logoPath = $logoPath;
        $this->noticeType = $noticeType->value;
        $this->heading = array(
            'pluginName' => $pluginName,
            'title' => $title,
            'description' => $description
        );
        $this->content = $content;
        $this->isDismissible = $isDismissible;
    }

    public function ToArray(): array
    {
        return (array)$this;
    }

}
