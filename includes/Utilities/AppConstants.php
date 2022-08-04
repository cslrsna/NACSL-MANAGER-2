<?php
namespace NACSL\Utilities;

use ArrayAccess;
use ParagonIE\Sodium\Core\Poly1305\State;

final class AppConstants
{
    const PLUGIN_NAME = "NACSL-MANAGER";
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
    public static string $version;

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
            'basename' => self::$basename,
            'version' => self::$version
        );
    }
}
