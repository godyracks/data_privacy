<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    /**
     * Base Site URL
     *
     * URL to your CodeIgniter root. Typically, this will be your base URL,
     * WITH a trailing slash:
     * E.g., http://example.com/
     *
     * @var string
     */
    public string $baseURL = '';

    /**
     * Allowed Hostnames in the Site URL other than the hostname in the baseURL.
     * If you want to accept multiple Hostnames, set this.
     *
     * @var array<string>
     */
    public array $allowedHostnames = [];

    /**
     * Index File
     *
     * Typically, this will be your `index.php` file, unless you've renamed it to
     * something else. If you have configured your web server to remove this file
     * from your site URIs, set this variable to an empty string.
     *
     * @var string
     */
    public string $indexPage = 'index.php';

    /**
     * URI Protocol
     *
     * This item determines which server global should be used to retrieve the
     * URI string. The default setting of 'REQUEST_URI' works for most servers.
     * If your links do not seem to work, try one of the other delicious flavors:
     *  'REQUEST_URI': Uses $_SERVER['REQUEST_URI']
     *  'QUERY_STRING': Uses $_SERVER['QUERY_STRING']
     *  'PATH_INFO': Uses $_SERVER['PATH_INFO']
     *
     * @var string
     */
    public string $uriProtocol = 'REQUEST_URI';

    /**
     * Allowed URL Characters
     *
     * This lets you specify which characters are permitted within your URLs.
     *
     * @var string
     */
    public string $permittedURIChars = 'a-z 0-9~%.:_\-';

    /**
     * Default Locale
     *
     * The Locale roughly represents the language and location that your visitor
     * is viewing the site from.
     *
     * @var string
     */
    public string $defaultLocale = 'en';

    /**
     * Negotiate Locale
     *
     * If true, the current Request object will automatically determine the
     * language to use based on the value of the Accept-Language header.
     *
     * @var bool
     */
    public bool $negotiateLocale = false;

    /**
     * Supported Locales
     *
     * If $negotiateLocale is true, this array lists the locales supported
     * by the application in descending order of priority.
     *
     * @var array<string>
     */
    public array $supportedLocales = ['en'];

    /**
     * Application Timezone
     *
     * The default timezone that will be used in your application to display
     * dates with the date helper.
     *
     * @var string
     */
    public string $appTimezone = 'UTC';

    /**
     * Default Character Set
     *
     * This determines which character set is used by default in various methods
     * that require a character set to be provided.
     *
     * @var string
     */
    public string $charset = 'UTF-8';

    /**
     * Force Global Secure Requests
     *
     * If true, this will force every request made to this application to be
     * made via a secure connection (HTTPS).
     *
     * @var bool
     */
    public bool $forceGlobalSecureRequests = false;

    /**
     * Reverse Proxy IPs
     *
     * If your server is behind a reverse proxy, you must whitelist the proxy
     * IP addresses from which CodeIgniter should trust headers such as
     * X-Forwarded-For or Client-IP.
     *
     * @var array<string, string>
     */
    public array $proxyIPs = [];

    /**
     * Content Security Policy
     *
     * Enables the Response's Content Secure Policy to restrict the sources that
     * can be used for images, scripts, CSS files, audio, video, etc.
     *
     * @var bool
     */
    public bool $CSPEnabled = false;

    public function __construct()
    {
        $this->baseURL = getenv('app.baseURL') ?: 'http://localhos/';
    }
}
