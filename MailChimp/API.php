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
     * Return the campaigns manager
     * @return \MailChimp\Manager\Campaigns
     */
    public function getCampaignsManager()
    {
        if (!isset($this->managers['campaignManager'])) {
            $manager = new Manager\Campaigns($this->client);
            $this->managers['campaignManager'] = $manager;
        }
        
        return $this->managers['campaignManager'];
    }
}
