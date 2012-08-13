<?php

/**
 * Handles campaign report data related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Client\ClientInterface;

class CampaignReportData extends ManagerAbstract
{
    /**
     * Set the API client
     * @param \MailChimp\Client\ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
    
    /**
     * Return the list of email addresses that clicked on a given url, and how many times they clicked
     * @param string $id The campaign id to get click stats for
     * @param string $url The URL of the link that was clicked on
     * @param int $start The page number to start at (Default: 0)
     * @param int $limit The number of results to return (Default: 1000, Max: 15000)
     * @return stdClass
     */
    public function campaignClickDetailAIM($id, $url, $start = 0, $limit = 1000)
    {
        // Prepare the parameters array
        $params = array('cid' => $id, 'url' => $url, 'start' => $start, 'limit' => $limit);
        
        // Build the request URL
        $request = $this->client->prepare('campaignClickDetailAIM', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Given a campaign and email address, return the entire
     * click and open history with timestamps, ordered by time 
     * @param string $id The campaign ID to get stats for
     * @param string|array $emails Email addresses to check
     * @return stdClass
     */
    public function campaignEmailStatsAIM($id, $emails)
    {
        // Prepare the parameters array
        $params = array('cid' => $id, 'email_address' => (array) $emails);
        
        // Build the request URL
        $request = $this->client->prepare('campaignEmailStatsAIM', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Given a campaign and correct paging limits, return the entire click and open history
     * with timestamps, ordered by time, for every user a campaign was delivered to
     * @param string $id The campaign ID to get stats for
     * @param int $start The page number to start at (Default: 0)
     * @param int $limit The number of results to return (Default: 100, Max: 1000)
     * @return stdClass
     */
    public function campaignEmailStatsAIMAll($id, $start = 0, $limit = 100)
    {
        // Prepare the parameters array
        $params = array('cid' => $id, 'start' => $start, 'limit' => $limit);
        
        // Build the request URL
        $request = $this->client->prepare('campaignEmailStatsAIMAll', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve the list of email addresses that did not open a given campaign
     * @param string $id The campaign id to get no opens for
     * @param int $start The page number to start at (Default: 0)
     * @param int $limit The number of results to return (Default: 1000, Max: 15000)
     * @return stdClass
     */
    public function campaignNotOpenedAIM($id, $start = 0, $limit = 1000)
    {
        // Prepare the parameters array
        $params = array('cid' => $id, 'start' => $start, 'limit' => $limit);
        
        // Build the request URL
        $request = $this->client->prepare('campaignNotOpenedAIM', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve the list of email addresses that opened a given campaign with how many times they opened
     * @param string $id The campaign id to get opens for
     * @param int $start The page number to start at (Default: 0)
     * @param int $limit The number of results to return (Default: 1000, Max: 15000)
     * @return stdClass
     */
    public function campaignOpenedAIM($id, $start = 0, $limit = 1000)
    {
        // Prepare the parameters array
        $params = array('cid' => $id, 'start' => $start, 'limit' => $limit);
        
        // Build the request URL
        $request = $this->client->prepare('campaignOpenedAIM', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
}
