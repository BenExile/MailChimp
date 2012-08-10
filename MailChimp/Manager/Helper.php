<?php

/**
 * Handles helper related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Manager\ManagerInterface;
use MailChimp\Client\ClientInterface;

class Helper implements ManagerInterface
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
     * Retrieve all Campaigns IDs a member was sent
     * I'm aware of an issue where a malformed response is received
     * when a subscriber who hasn't been sent any campaigns is queried
     * @param string $email Email address to search
     * @param string $listID A list ID to limit the campaigns to
     * @return array Array of campaign IDs
     */
    public function campaignsForEmail($email, $listID = null)
    {
        // Prepare the parameters array
        $params = array(
            'email_address' => $email,
            'options' => array('list_id' => $listID),
        );
        
        // Build the request URL
        $request = $this->client->prepare('campaignsForEmail', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Return the current Chimp Chatter messages for an account
     * @return array An array of chatter messages and properties
     */
    public function chimpChatter()
    {
        // Build the request URL
        $request = $this->client->prepare('chimpChatter');
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Have HTML content auto-converted to a text-only format
     * @todo Add support for 'template' type
     * @param string $content HTML content, valid URL, campaign ID or template ID
     * @param string $type One of html, url, cid or tid
     * @throws \MailChimp\Exception
     * @return string
     */
    public function generateText($content, $type = 'html')
    {
        // Convert type to lowercase
        $type = strtolower($type);
        
        if ($type == 'template') {
            throw new \MailChimp\Exception('Content type `template` is not supported at this time');
        } elseif ($type == 'url' && !parse_url($content)) {
            throw new \MailChimp\Exception('Unable to parse URL ' . $content);
        }
        
        // Prepare the parameters array
        $params = array('type' => $type, 'content' => $content);
        
        // Build the request URL
        $request = $this->client->prepare('generateText', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve lots of account information including payments made, plan info,
     * some account stats, installed modules, contact info, and more.
     * @return stdClass
     */
    public function getAccountDetails()
    {
        // Build the request URL
        $request = $this->client->prepare('getAccountDetails');
        
        // Return the API response
        return $this->client->request($request);
    }
    
	/**
     * Retrieve all domains verification records for an account 
     * @return array
     */
    public function getVerifiedDomains()
    {
        // Build the request URL
        $request = $this->client->prepare('getVerifiedDomains');
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Send your HTML content to have the CSS inlined
     * @param string $html Your HTML content
     * @param bool $stripCss Strip CSS <style> tags from the returned document
     * @return string Your HTML content with all CSS inlined, just like if MailChimp sent it
     */
    public function inlineCss($html, $stripCss = false)
    {
        // Prepare the parameters array
        $params = array('html' => $html, 'strip_css' => $stripCss);
        
        // Build the request URL
        $request = $this->client->prepare('inlineCss', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve all List IDs a member is subscribed to
     * @param string $email Email address to query
     * @return array
     */
    public function listsForEmail($email)
    {
        // Build the request URL
        $request = $this->client->prepare('listsForEmail', array('email_address' => $email));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Ping the MailChimp API
     * @return string "Everything's Chimpy!" or an error message
     */
    public function ping()
    {
        // Build the request URL
        $request = $this->client->prepare('ping');
        
        // Return the API response
        return $this->client->request($request);
    }
}
