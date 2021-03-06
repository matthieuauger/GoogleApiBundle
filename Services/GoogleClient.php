<?php

namespace HappyR\Google\ApiBundle\Services;

use Google_Client;

/**
 * This is the google client that is used by almost every api
 */
class GoogleClient
{
    /**
     * @var Google_Client
     */
    protected $client;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        // True if objects should be returned by the service classes.
        // False if associative arrays should be returned (default behavior).
        $config['use_objects'] = true;

        $client = new Google_Client($config);

        $client->setApplicationName($config['application_name']);
        $client->setClientId($config['oauth2_client_id']);
        $client->setClientSecret($config['oauth2_client_secret']);
        $client->setRedirectUri($config['oauth2_redirect_uri']);

        if (array_key_exists('developer_key', $config)) {
            $client->setDeveloperKey($config['developer_key']);
        }

        $this->client = $client;
    }

    /**
     * @return Google_Client
     */
    public function getGoogleClient()
    {
        return $this->client;
    }

    /**
     * @param $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->client->setAccessToken($accessToken);
    }

    /**
     * @param null $code
     */
    public function authenticate($code = null)
    {
        $this->client->authenticate($code);
    }

    /**
     * @return string
     */
    public function createAuthUrl()
    {
        return $this->client->createAuthUrl();
    }

    /**
     * Get the OAuth 2.0 access token.
     *
     * @return string $accessToken JSON encoded string in the following format:
     * {"access_token":"TOKEN", "refresh_token":"TOKEN", "token_type":"Bearer",
     *  "expires_in":3600,"id_token":"TOKEN", "created":1320790426}
     */
    public function getAccessToken()
    {
        return $this->client->getAccessToken();
    }

    /**
     * Returns if the access_token is expired.
     * @return bool Returns True if the access_token is expired.
     */
    public function isAccessTokenExpired()
    {
        return $this->client->isAccessTokenExpired();
    }
}