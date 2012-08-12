<?php

/**
 * Handles e-commerce related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Manager\ManagerInterface;
use MailChimp\Client\ClientInterface;

class Ecommerce extends ManagerAbstract implements ManagerInterface
{    
    /**
     * Set the API client
     * @param unknown_type $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
}
