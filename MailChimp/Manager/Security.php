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

class Security implements ManagerInterface
{
    
    protected $client = null;
    
    /**
     * Set the API client
     * @param unknown_type $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
}
