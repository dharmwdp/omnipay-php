<?php

namespace Omnipay\Api;

class Api
{
    protected static $baseUrl = 'https://psp.digitalworld.com.sa/api/v1/';

    protected static $key = null;

    protected static $secret = null;

    protected static $apiMode = null;

    /*
     * App info is to store the Plugin/integration
     * information
     */
    public static $appsDetails = array();

    const VERSION = '1.0.0';

    /**
     * @param string $key
     * @param string $secret
     */
    public function __construct($key, $secret, $apiMode)
    {
        self::$key = $key;
        self::$secret = $secret;
        self::$apiMode = $apiMode;

    }

    /*
     *  Set Headers
     */
    public function setHeader($header, $value)
    {
        Request::addHeader($header, $value);
    }

    public function setAppDetails($title, $version = null)
    {
        $app = array(
            'title' => $title,
            'version' => $version
        );

        array_push(self::$appsDetails, $app);
    }

    public function getAppsDetails()
    {
        return self::$appsDetails;
    }

    public function setBaseUrl($baseUrl)
    {
        self::$baseUrl = $baseUrl;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $className = __NAMESPACE__.'\\'.ucwords($name);

        $entity = new $className();

        return $entity;
    }

    public static function getBaseUrl()
    {
        return self::$baseUrl;
    }

    public static function getKey()
    {
        return self::$key;
    }

    public static function getSecret()
    {
        return self::$secret;
    }

    public static function getApiMode()
    {
        return self::$apiMode;
    }

    public static function getFullUrl($relativeUrl)
    {
        return self::getBaseUrl() . $relativeUrl;
    }
}
