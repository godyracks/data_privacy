<?php
namespace App\Libraries;

use Google\Client;
use Google\Service\Oauth2;
require_once __DIR__ . '/vendor/autoload.php';

class GoogleApi
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'http' => [
                'verify' => false, // Disable SSL certificate validation
            ],
        ]);
        $this->client = new Client();
        $this->client->setClientId('768488848254-gs7b3v3gf13a9r48l72clb465sbki01j.apps.googleusercontent.com');
        $this->client->setClientSecret('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');
        
        // Detect environment and set redirect URI accordingly
        $redirectUri = ($_SERVER['HTTP_HOST'] === 'localhost') ? getenv('google.redirect_uri_local') : getenv('google.redirect_uri_production');
        $this->client->setRedirectUri($redirectUri);
        
        $this->client->addScope('email');
        $this->client->addScope('profile');
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getLoginUrl()
    {
        return $this->client->createAuthUrl();
    }

    public function authenticate($code)
    {
        $this->client->fetchAccessTokenWithAuthCode($code);
        return $this->client->getAccessToken();
    }

    public function getUserInfo()
    {
        $oauth2 = new Oauth2($this->client);
        return $oauth2->userinfo->get();
    }
}
