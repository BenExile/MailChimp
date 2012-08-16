<?php

/**
 * Handles campaign stats related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Client\ClientInterface;

class CampaignStats extends ManagerAbstract
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
     * Get all email addresses that complained about a given campaign
     * @param string $id Campaign ID to pull abuse reports for
     * @param int $start The page number to start at (Default: 0)
     * @param int $limit The number of results to return (Default: 500, Max: 1000)
     * @param string $since Pull reports since this time only (YYYY-MM-DD HH:II:SS (GMT))
     * @return stdClass
     */
    public function campaignAbuseReports($id, $start = 0, $limit = 500, $since = null)
    {
        // Prepare the parameters array
        $params = array(
            'cid' => $id,
            'start' => $start,
            'limit' => $limit,
            'since' => $since,
        );
        
        // Build the request URL
        $request = $this->client->prepare('campaignAbuseReports', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve the text presented in our app for how a campaign 
     * performed and any advice we may have for you
     * @param string $id The campaign ID to pull advice text for
     * @return stdClass
     */
    public function campaignAdvice($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignAdvice', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve the Google Analytics data we've collected for this campaign
     * @param string $id The campaign ID to pull analytics data for
     * @return stdClass
     */
    public function campaignAnalytics($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignAnalytics', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve the most recent full bounce message for a specific email address on the given campaign
     * Note: The server returns an error if no bounce message is found (yuck), lib returns boolean false
     * @param string $id Campaign ID to pull bounces for
     * @param string $email Email address or member ID to pull bounce for
     * @return stdClass|bool
     */
    public function campaignBounceMessage($id, $email)
    {
        // Prepare the parameters array
        $params = array('cid' => $id, 'email' => $email);
        
        // Build the request URL
        $request = $this->client->prepare('campaignBounceMessage', $params);
        
        // Return the API response
        try {
            return $this->client->request($request);
        } catch (\MailChimp\Exception $e) {
            return false;
        }
    }
    
    /**
     * Retrieve the full bounce messages for the given campaign
     * @param string $id Campaign ID to pull bounces for
     * @param int $start The page number to start at (Default: 0)
     * @param int $limit The number of results to return (Default: 25, Max: 50)
     * @param string $since Pull only messages since this time (YYYY-MM-DD (GMT))
     */
    public function campaignBounceMessages($id, $start = 0, $limit = 25, $since = null)
    {
        // Prepare the parameters array
        $params = array(
            'cid' => $id,
            'start' => $start,
            'limit' => $limit,
            'since' => $since,
        );
        
        // Build the request URL
        $request = $this->client->prepare('campaignBounceMessages', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Get an array of the urls being tracked, and their click counts for a given campaign
     * @param string $id The campaign id to pull stats for
     * @return array
     */
    public function campaignClickStats($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignClickStats', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve the Ecommerce Orders tracked by campaignEcommOrderAdd()
     * @param string $id Campaign ID to retrieve orders for
     * @param int $start The page number to start at (Default: 0)
     * @param int $limit The number of results to return (Default: 100, Max: 500)
     * @param string $since Pull only orders since this time (YYYY-MM-DD HH:II:SS (GMT))
     * @return stdClass
     */
    public function campaignEcommOrders($id, $start = 0, $limit = 100, $since = null)
    {
        // Prepare the parameters array
        $params = array(
            'cid' => $id,
            'start' => $start,
            'limit' => $limit,
            'since' => $since,
        );
        
        // Build the request URL
        $request = $this->client->prepare('campaignEcommOrders', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve the tracked eepurl mentions on Twitter
     * @param string $id The campaign ID to pull stats for
     * @return stdClass
     */
    public function campaignEepUrlStats($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignEepUrlStats', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Get the top 5 performing email domains for this campaign
     * @param string $id The campaign ID to pull stats for
     * @return stdClass
     */
    public function campaignEmailDomainPerformance($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignEmailDomainPerformance', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve the countries and number of opens tracked for each
     * @param string $id The campaign ID to pull stats for
     * @return array
     */
    public function campaignGeoOpens($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignGeoOpens', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve the regions and number of opens tracked for a certain country
     * @param string $id The campaign ID to pull stats for
     * @param string $code An ISO3166 2 digit country code
     * @return array
     */
    public function campaignGeoOpensForCountry($id, $code)
    {
        // Prepare the parameters array
        $params = array('cid' => $id, 'code' => $code);
        
        // Build the request URL
        $request = $this->client->prepare('campaignGeoOpensForCountry', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Get all unsubscribed email addresses for a given campaign
     * @param string $id Campaign ID to retrieve members for
     * @param string $status One of 'sent', 'hard', or 'soft' (Default: returns all)
     * @param int $start The page number to start at (Default: 0)
     * @param int $limit The number of results to return (Default: 1000, Max: 15000)
     * @return stdClass
     */
    public function campaignMembers($id, $status = null, $start = 0, $limit = 1000)
    {
        // Ensure status is valid
        $statuses = array('sent', 'hard', 'soft');
        if (isset($status) && !in_array($status, $statuses)) {
            $statuses = implode(', ', $statuses);
            $message = 'Expected status to be one of ' . $statuses . ', got ' . $status;
            throw new \MailChimp\Exception($message);
        }
        
        // Prepare the parameters array
        $params = array(
            'cid' => $id,
            'status' => $status,
            'start' => $start,
            'limit' => $limit,
        );
        
        // Build the request URL
        $request = $this->client->prepare('campaignUnsubscribes', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Get all the relevant campaign statistics (opens, bounces, clicks, etc.)
     * @param string $id The campaign ID to pull stats for
     * @return stdClass
     */
    public function campaignStats($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignStats', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Get all unsubscribed email addresses for a given campaign
     * @param string $id Campaign ID to retrieve unsubscribes for
     * @param int $start The page number to start at (Default: 0)
     * @param int $limit The number of results to return (Default: 1000, Max: 15000)
     * @return stdClass
     */
    public function campaignUnsubscribes($id, $start = 0, $limit = 1000)
    {
        // Prepare the parameters array
        $params = array(
            'cid' => $id,
            'start' => $start,
            'limit' => $limit,
        );
        
        // Build the request URL
        $request = $this->client->prepare('campaignUnsubscribes', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
}
