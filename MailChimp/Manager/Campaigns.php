<?php

/**
 * Handles campaign related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

final class Campaigns implements ManagerInterface
{
    /**
     * Array of valid campaign types
     * @var array
     */
    private $campaignTypes = array('regular', 'plaintext', 'absplit', 'rss', 'auto');
    
    /**
     * Set the API client
     * @param unknown_type $client
     */
    public function __construct(\MailChimp\Client\ClientInterface $client)
    {
        $this->client = $client;
    }
    
    /**
     * Create a new draft campaign to send
     * @todo Improve checking of parameters
     * @link http://apidocs.mailchimp.com/api/1.3/campaigncreate.func.php
     * @param string $type Campaign type, one of regular, plaintext, absplit, rss or auto
     * @param array $options Associative array of the options for this campaign
     * @param array $content Associative array of the content for this campaign
     */
    public function campaignCreate($type, array $options, array $content)
    {
        // Check that $type is valid
        $type = strtolower($type);
        if (!in_array($type, $this->campaignTypes)) {
            $message = 'Expected type to be one of ' . implode(', ', $this->campaignTypes) . ', got ' . $type;
            throw new Exception($message);
        }
    
        // Check that mandatory options are set
        $requiredOptions = array('list_id', 'subject', 'from_email', 'from_name');
        foreach ($requiredOptions as $value) {
            if (!array_key_exists($value, $options)) {
                throw new Exception('Manadatory option `' . $value . '` was not passed in $options');
            }
        }
    
        // Check that some content was passed
        if (empty($content)) {
            throw new Exception('Content must not be empty. See documentation for valid options');
        }
    
        // Prepare the parameters and make the API call
        $params = array('type' => $type, 'options' => $options, 'content' => $content);
        $request = $this->client->prepare('campaignCreate', $params);
        
        // Execute the request and return
        return $this->client->request($request);
    }
    
    /**
     * Get the list of campaigns and their details matching the specified filters
     * @link http://apidocs.mailchimp.com/api/1.3/campaigns.func.php
     * @param array $filters Associative array of filters to apply to this query
     * @param int $start Start results at this campaign # (Default: 0)
     * @param int $limit Number of campaigns to return with each call (Max. 1000)
     */
    public function campaigns(array $filters = array(), $start = 0, $limit = 25)
    {
        // Prepare the parameters and make the API call
        $params = array('filters' => $filters, 'start' => $start, 'limit' => $limit);
        $request = $this->client->prepare('campaigns', $params);
        return $this->client->request($request);
    }
}