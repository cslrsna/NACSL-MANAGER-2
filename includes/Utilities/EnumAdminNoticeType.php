<?php
namespace NACSL\Utilities;

enum EnumAdminNoticeType: string
{
    case ERROR = 'notice-error';
    case WARNING = 'notice-warning';
    case SUCCESS = 'notice-success';
    case INFO = 'notice-info';
}