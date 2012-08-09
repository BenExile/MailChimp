<?php

/**
 * API client interface
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Client
 */
namespace MailChimp\Client;

interface ClientInterface
{
    /**
     * Set the API key and check dependencies
     * @param string $key User API key
     */
    public function __construct($key);
    
    /**
     * Send a request to the API server
     * @param string $url API request URL
     */
    public function request($url);
}
