<?php

namespace HappyR\Google\ApiBundle\Services;

use \Google_Client;

/**
 * This is the class that communicates with analytics api
 */
class AnalyticsService extends \Google_Service_Analytics
{
    /**
     * @var GoogleClient
     */
    public $client;

    /**
     * @param GoogleClient $client
     */
    public function __construct(GoogleClient $client)
    {
        $this->client = $client;

        parent::__construct($client->getGoogleClient());
    }
}