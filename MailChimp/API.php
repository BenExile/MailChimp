<?php

/**
 * MailChimp API class
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 */
namespace MailChimp;

class API
{   
    /**
     * Instance of the cURL client
     * @var null|Client
     */
    private $client = null;
    
    /**
     * API managers array
     * @var array
     */
    private $managers = array();
    
    /**
     * Set the API client object
     * @param string $client API client object
     */
    public function __construct(Client\ClientInterface $client)
    {   
        // Set the API client
        $this->client = $client;
    }
    
    /**
     * Retrieve an API method manager
     * If the requested manager does not exist, this method
     * will create one and cache the object for later use
     * @param string $manager Class name of manager to get
     * @return \MailChimp\Manager
     */
    public function getManager($manager)
    {
        if (!isset($this->managers[$manager])) {
            $class = '\\MailChimp\\Manager\\' . $manager;
            $this->managers[$manager] = new $class($this->client);
        }
        
        return $this->managers[$manager];
    }
}
