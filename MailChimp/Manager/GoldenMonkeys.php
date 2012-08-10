<?php

/**
 * Handles golden monkeys related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Manager\ManagerInterface;
use MailChimp\Client\ClientInterface;

class GoldenMonkeys implements ManagerInterface
{
    /**
     * API client
     * @var null|ClientInterface
     */
    protected $client = null;
    
    /**
     * Set the API client
     * @param unknown_type $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
    
    /**
     * Retrieve all Activity (opens/clicks) for Golden Monkeys over the past 10 days
     * @return array
     */
    public function gmonkeyActivity()
    {
        // Build the request URL
        $request = $this->client->prepare('gmonkeyActivity');
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Add Golden Monkey(s)
     * $email should be a string for a single email address, or an
     * array if you wish to add multiple Golden Monkeys in a single call
     * @param string $id List ID to connect to
     * @param string|array $email Email addresses to add as Golden Monkeys
     * @return stdClass
     */
    public function gmonkeyAdd($id, $emails)
    {
        // Prepare the parameters array
        $params = array('id' => $id, 'email_address' => (array) $emails);
        
        // Build the request URL
        $request = $this->client->prepare('gmonkeyAdd', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Remove Golden Monkey(s)
     * @param string $id List ID to connect to
     * @param string|array $email Email addresses to remove from Golden Monkeys
     * @return stdClass
     */
    public function gmonkeyDel($id, $emails)
    {
        // Prepare the parameters array
        $params = array('id' => $id, 'email_address' => (array) $emails);
        
        // Build the request URL
        $request = $this->client->prepare('gmonkeyDel', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve all Golden Monkey(s) for an account
     * @return array
     */
    public function gmonkeyMembers()
    {
        // Build the request URL
        $request = $this->client->prepare('gmonkeyMembers');
        
        // Return the API response
        return $this->client->request($request);
    }
}
