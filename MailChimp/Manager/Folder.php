<?php

/**
 * Handles folder related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Client\ClientInterface;

class Folder extends ManagerAbstract
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
     * Add a new folder to file campaigns or autoresponders in
     * @link http://apidocs.mailchimp.com/api/1.3/folderadd.func.php
     * @param string $name A unique name for a folder
     * @param string $type Either 'campaign' or 'autoresponder'
     * @return int
     */
    public function folderAdd($name, $type = 'campaign')
    {
        // Prepare the parameters array
        $params = array('name' => $name, 'type' => $type);
        
        // Build the request URL
        $request = $this->client->prepare('folderAdd', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Delete a campaign or autoresponder folder
     * Note: This will make campaigns in the folder appear unfiled, they are not removed
     * @link http://apidocs.mailchimp.com/api/1.3/folderdel.func.php
     * @param int $id The folder ID to delete
     * @return bool
     */
    public function folderDel($id)
    {
        // Build the request URL
        $request = $this->client->prepare('folderDel', array('fid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Update the name of a folder for campaigns or autoresponders
     * @link http://apidocs.mailchimp.com/api/1.3/folderupdate.func.php
     * @param int $id The folder ID to update
     * @param string $name Updated name for the folder
     * @return bool
     */
    public function folderUpdate($id, $name)
    {
        // Prepare the parameters array
        $params = array('fid' => $id, 'name' => $name);
        
        // Build the request URL
        $request = $this->client->prepare('folderUpdate', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * List all the folders for a user account
     * @link http://apidocs.mailchimp.com/api/1.3/folders.func.php
     * @param string $type Either 'campaign' or 'autoresponder'
     * @return stdClass
     */
    public function folders($type = 'campaign')
    {   
        // Build the request URL
        $request = $this->client->prepare('folders', array('type' => $type));
        
        // Return the API response
        return $this->client->request($request);
    }
}
