<?php

/**
 * Handles campaign related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Client\ClientInterface;

interface ManagerInterface
{   
    /**
     * Set the API client
     * @param \MailChimp\Client\ClientInterface $client
     */
    public function __construct(ClientInterface $client);
}
