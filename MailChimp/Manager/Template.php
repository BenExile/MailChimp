<?php

/**
 * Handles template related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Manager\ManagerInterface;
use MailChimp\Client\ClientInterface;

class Template implements ManagerInterface
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
    
    /**
     * Create a new user template
     * See first link for MailChimp template language used in $html
     * @link http://www.mailchimp.com/resources/email-template-language/
     * @link http://apidocs.mailchimp.com/api/1.3/templateadd.func.php
     * @param string $name Name of the template
     * @param string $html Template HTML
     */
    public function templateAdd($name, $html)
    {
        // Check that both $name and $html are not empty
        if (empty($name) || empty($html)) {
            $message = 'Name and HTML must be provided in order to add a template';
            throw new \MailChimp\Exception($message);
        }
        
        // Prepare the parameters array
        $params = array('name' => $name, 'html' => $html);
        
        // Build the request URL
        $request = $this->client->prepare('templateAdd', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Delete (deactivate) a user template
     * @param int|string $id ID of the template you wish to deactivate
     * @return bool
     */
    public function templateDel($id)
    {
        // Build the request URL
        $request = $this->client->prepare('templateDel', array('id' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Pull details for a specific template to help support editing
     * @link http://apidocs.mailchimp.com/api/1.3/templateinfo.func.php
     * @param int|string $id ID of the template you wish to pull info for
     * @param string $type Template type to load, user (default), gallery, base
     * @return stdClass
     */
    public function templateInfo($id, $type = 'user')
    {
        // Prepare the parameters array
        $params =  array('tid' => $id, 'type' => $type);
        
        // Build the request URL
        $request = $this->client->prepare('templateInfo', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Undelete (reactivate) a user template
     * @link http://apidocs.mailchimp.com/api/1.3/templateundel.func.php
     * @param int|string $id ID of the template you wish to reactivate
     * @return bool
     */
    public function templateUndel($id)
    {
        // Build the request URL
        $request = $this->client->prepare('templateUndel', array('id' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Replace the content of a user template, not campaign content
     * See first link for MailChimp template language used in $html
     * @link http://www.mailchimp.com/resources/email-template-language/
     * @link http://apidocs.mailchimp.com/api/1.3/templateupdate.func.php
     * @param int|string $id ID of the template you wish to update
     * @param null|string $name Updated name for the template
     * @param null|string $html Updated HTML for the template
     * @throws \MailChimp\Exception
     * @return bool
     */
    public function templateUpdate($id, $name = null, $html = null)
    {
        // Both name and html are optional, but we'll force one to be required
        if (empty($name) && empty($html)) {
            $message = 'Either name or HTML must be provided in order to update a template';
            throw new \MailChimp\Exception($message);
        }
        
        // Prepare the parameters array
        $params = array(
            'id' => $id,
            'values' => array('name' => $name, 'html' => $html),
        );
        
        // Build the request URL
        $request = $this->client->prepare('templateUpdate', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve various templates available in the system
     * @link http://apidocs.mailchimp.com/api/1.3/templates.func.php
     * @param array $types Associative array of types to include or null
     * @param null|string $category Limit gallery templates to a specific category
     * @param array $inactives Control how inactive templates are returned
     * @return stdClass
     */
    public function templates(array $types = array(), $category = null, array $inactives = array())
    {
        // Prepare the parameters array
        $params = array(
            'types' => $types,
            'category' => $category,
            'inactives' => $inactives
        );
        
        // Build the request URL
        $request = $this->client->prepare('templates', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
}
