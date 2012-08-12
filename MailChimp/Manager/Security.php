<?php

/**
 * Handles security related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Manager\ManagerInterface;
use MailChimp\Client\ClientInterface;

class Security extends ManagerAbstract implements ManagerInterface
{
    /**
     * Set the API client
     * @param unknown_type $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
    
    /**
     * Add an API Key to your account
     * @link http://apidocs.mailchimp.com/api/1.3/apikeyadd.func.php
     * @param string $username MailChimp username
     * @param string $password MailChimp password
     * @param string $apiKey A valid API key for the user account
     * @return string A new API key
     */
    public function apiKeyAdd($username, $password, $apiKey)
    {
        // Prepare the parameters array
        $params = array(
            'username' => $username,
            'password' => $password,
            'apikey' => $apiKey,
        );
        
        // Build the request URL
        $request = $this->client->prepare('apikeyAdd', $params);
        
        // Return the API response
        return $this->client->request($request);
    }

    /**
     * Expire a Specific API Key
     * Note that if you expire all of your keys, just visit your API dashboard to create a new one
     * @link http://apidocs.mailchimp.com/api/1.3/apikeyexpire.func.php
     * @param string $username MailChimp username
     * @param string $password MailChimp password
     * @param string $apiKey A valid API key for the user account
     */
    public function apikeyExpire($username, $password, $apiKey)
    {
        // Prepare the parameters array
        $params = array(
            'username' => $username,
            'password' => $password,
            'apikey' => $apiKey,
        );
        
        // Build the request URL
        $request = $this->client->prepare('apikeyExpire', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve a list of all MailChimp API Keys for this User 
     * @param string $username MailChimp username
     * @param string $password MailChimp password
     * @param string $apiKey A valid API key for the user account
     * @param bool $expired Whether or not to include expired keys
     * @return stdClass
     */
    public function apiKeys($username, $password, $apiKey, $expired = false)
    {
        // Prepare the parameters array
        $params = array(
            'username' => $username,
            'password' => $password,
            'apikey' => $apiKey,
            'expired' => $expired,
        );
        
        // Build the request URL
        $request = $this->client->prepare('apikeys', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
}
