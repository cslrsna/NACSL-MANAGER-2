<?php
namespace NACSL\Utilities;

use ArrayAccess;

final class AppConstants
{
    const PLUGIN_NAME = "NACSL MANAGER";
    const PREFIX = "nacsl_";
    const TEXT_DOMAIN = "nacsl_domain";

    const OPT_ACTIVATED = "nacsl_isActivated";
    const OPT_VERSION   = "nacsl_version";

    public static string $__FILE__;
    public static string $__DIR__;
    public static string $adminPath;
    public static string $adminUrl;
    public static string $publicPath;
    public static string $publicUrl;
    public static string $languagesPath;
    public static string $languagesUrl;
    public static array $data;
    public static string $basename;

    public static function Hydrate(string $__file__, string $__dir__):void
    {
        self::$__FILE__ = __file__;
        self::$__DIR__ = __dir__;
        
        self::$adminPath = __dir__ . "admin/";
        self::$adminUrl = plugin_dir_url(__file__) . "admin/";
        
        self::$publicPath = __dir__ . "public/";
        self::$publicUrl = plugin_dir_url(__file__) . "public/";
        
        self::$languagesPath = __dir__ . "languages/";
        self::$languagesUrl = plugin_dir_url(__file__) . "languages/";
        
        self::$basename = basename(__file__);
        
        if( !function_exists('get_plugin_data') ){
            require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        }
        self::$data = get_plugin_data(__file__);        
    }
    public static function ToArray(){
        return array(
            'PLUGIN_NAME' => self::PLUGIN_NAME,
            'PREFIX' => self::PREFIX,
            'TEXT_DOMAIN' => self::TEXT_DOMAIN,
            'OPT_ACTIVATED' => self::OPT_ACTIVATED,
            'OPT_VERSION' => self::OPT_VERSION,
            '__FILE__' => self::$__FILE__,
            '__DIR__' => self::$__DIR__,
            'adminPath' => self::$adminPath,
            'adminUrl' => self::$adminUrl,
            'publicPath' => self::$publicPath,
            'publicUrl' => self::$publicUrl,
            'languagesPath' => self::$languagesPath,
            'languagesUrl' => self::$languagesUrl,
            'data' => self::$data,
            'basename' => self::$basename
        );
    }
}
