<?php
namespace NACSL\Utilities;

use ArrayAccess;
use ParagonIE\Sodium\Core\Poly1305\State;
/**
 * All constants of NACSL-MANAGER
 * @package NACSL\Utilities
 */
final class AppConstants
{
    const PLUGIN_NAME = "NACSL-MANAGER";
    const PREFIX = "nacsl_";
    const TEXT_DOMAIN = "nacsl_domain";
    const OPT_ACTIVATED = "nacsl_isActivated";
    const OPT_VERSION   = "nacsl_version";

    /**
     * NACSL-MANAGER main file
     * @var string
     */
    public static string $__FILE__;

    /**
     * NACSL-MANAGER main file directory
     * @var string
     */
    public static string $__DIR__;

    /**
     * NACSL-MANAGER plugin_basename(__FILE__)
     * @var string
     */
    public static string $basename;

    /**
     * NACSL-MANAGER actual version
     * @var string
     */
    public static string $version;

    /**
     * Path of NACSL-MANAGER languages assets
     * @var string
     */
    public static string $languagesPath;
    /**
     * Url of NACSL-MANAGER languages assets
     * @var string
     */
    public static string $languagesUrl;
    /**
     * Path of NACSL-MANAGER public assets
     * @var string
     */
    public static string $publicPath;
    /**
     * Url of NACSL-MANAGER public assets
     * @var string
     */
    public static string $publicUrl;
    /**
     * Path of NACSL-MANAGER admin assets
     * @var string
     */
    public static string $adminPath;
    /**
     * Url of NACSL-MANAGER admin assets
     * @var string
     */
    public static string $adminUrl;
    /**
     * get_plugin_data(__FILE__) from NACSL-MANAGER basename file.
     * @var array
     */
    public static array $data;

    /**
     * Get an array of all NACSL-MANAGER constants.
     * @return string[] 
     */
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
