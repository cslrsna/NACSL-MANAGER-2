<?php
namespace NACSL\Utilities;

use NACSL\Models\ViewModels\AdminNoticeVM;
use NACSL\Utilities\AppConstants;
use NACSL\Utilities\EnumAdminNoticeType;
use NACSL\Utilities\IHookAdmin;
use Timber\Timber;

/**
 * Override Administrator notices
 * @package NACSL\Utilities
 */
class AdminNotice implements IHookAdmin
{
    private AdminNoticeVM $_noticeVM;
    private string $_logo;
    private string $_pluginName;

    /**
     * Instance of AdminNotice
     * @param EnumAdminNoticeType $noticeType @see NACSL\Utilities\EnumAdminNoticeType
     * @param string $subTitle Notice sub title
     * @param string $content Notice content
     * @param string $description (optional) Notice description
     * @return void 
     */
    public function __construct(EnumAdminNoticeType $noticeType, string $subTitle, string $content, string $description = '')
    {
        $this->_logo = AppConstants::$adminUrl . '/images/logo-na.png';
        $this->_pluginName = AppConstants::PLUGIN_NAME;
        $this->Message($noticeType, $subTitle, $content, $description);
    }


    public static function RemoveDefault(){
        add_action('admin_head', function(){
            ?>
            <style>
                .updated{
                    display: none;
                }
            </style>
            <?php
        });
    }

    public function Message(EnumAdminNoticeType $noticeType, string $title, string $content, string $description = '')
    {
        $this->_noticeVM = new AdminNoticeVM( 
            $this->_logo, 
            $noticeType,
            $this->_pluginName,
            $title,
            $description,
            $content,
            true
        );
        $this->Hook();
    }

    public function Action():void
    {
        Timber::render('_AdminNoticesPartial.twig', $this->_noticeVM->ToArray());
    }

    public function Hook(): void 
    { 
        $this->RemoveDefault();
        add_action( 'admin_notices', array($this, 'Action'));
    }
    
}
