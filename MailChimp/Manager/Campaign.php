<?php

/**
 * Handles campaign related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Client\ClientInterface;
use MailChimp\Ecommerce\OrderInterface;

class Campaign extends ManagerAbstract
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
     * Get the content (both html and text) for a campaign
     * Returns the content either as it would appear in the
     * campaign archive or as the raw, original content
     * @link http://apidocs.mailchimp.com/api/1.3/campaigncontent.func.php
     * @param string $id The campaign ID to get content for
     * @param bool $archive Return the archive (default) or raw version
     * @return stdClass
     */
    public function campaignContent($id, $archive = true)
    {
        // Prepare the parameters array
        $params = array('cid' => $id, 'for_archive' => $archive);
        
        // Build the request URL
        $request = $this->client->prepare('campaignContent', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Create a new draft campaign to send
     * @todo Implement this method
     * @throws \MailChimp\Exception
     */
    public function campaignCreate()
    {
        throw new \MailChimp\Exception('This method has not yet been implemented');
    }
    
    /**
     * Permanently delete a campaign
     * @link http://apidocs.mailchimp.com/api/1.3/campaigndelete.func.php
     * @param string $id The campaign ID to delete
     * @return bool
     */
    public function campaignDelete($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignDelete', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Attach ecommerce order information to a campaign
     * @see \MailChimp\Ecommerce\Order
     * @param OrderInterface $order An order object ready to be prepared
     * @return bool
     */
    public function campaignEcommOrderAdd(OrderInterface $order)
    {
        // Call prepare() on the order to retrieve the request parameters
        $params = array('order' => $order->prepare());
        
        // Build the request URL
        $request = $this->client->prepare('campaignEcommOrderAdd', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Pause an AutoResponder or RSS campaign from sending
     * @link http://apidocs.mailchimp.com/api/1.3/campaignpause.func.php
     * @param string $id The campaign ID to pause
     * @return bool
     */
    public function campaignPause($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignPause', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Replicate a campaign
     * @link http://apidocs.mailchimp.com/api/1.3/campaignreplicate.func.php
     * @param string $id The campaign ID to replicate
     * @return string The ID of the newly created campaign
     */
    public function campaignReplicate($id)
    {
        // Prepare the parameters array
        $params = array('cid' => $id);
    
        // Build the request URL
        $request = $this->client->prepare('campaignReplicate', $params);
    
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Resume sending an AutoResponder or RSS campaign 
     * @link http://apidocs.mailchimp.com/api/1.3/campaignresume.func.php
     * @param string $id The campaign ID to resume
     * @return bool
     */
    public function campaignResume($id)
    {
        // Prepare the parameters array
        $params = array('cid' => $id);
    
        // Build the request URL
        $request = $this->client->prepare('campaignResume', $params);
    
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Schedule a campaign to be sent in the future
     * Schedule times should be provided in the format YYYY-MM-DD HH:II:SS (GMT)
     * @link http://apidocs.mailchimp.com/api/1.3/campaignschedule.func.php
     * @param string $id The campaign ID to schedule sending for
     * @param string $scheduleTime The time to schedule the campaign (For A/B split, the time for group A)
     * @param null|string $scheduleTimeB The time to schedule group B of an A/B split campaign
     * @return bool
     */
    public function campaignSchedule($id, $scheduleTime, $scheduleTimeB = null)
    {
        // @todo Improve the date format pattern to detect invalid dates
        $pattern = '/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/';
        
        // Ensure schedule time(s) are formatted correctly
        if (!preg_match($pattern, $scheduleTime)) {
           $message = 'Schedule time must be provided in the format YYYY-MM-DD HH:II:SS';
           throw new \MailChimp\Exception($message);
        } elseif (isset($scheduleTimeB) && !preg_match($pattern, $scheduleTimeB)) {
            $message = 'Group B schedule time must be provided in the format YYYY-MM-DD HH:II:SS';
            throw new \MailChimp\Exception($message);
        }
        
        // Prepare the parameters array
        $params = array(
            'cid' => $id,
            'schedule_time' => $scheduleTime,
            'schedule_time_b' => $scheduleTimeB,
        );
        
        // Build the request URL
        $request = $this->client->prepare('campaignSchedule', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Allows one to test their segmentation rules before creating a campaign using them
     * @todo Implement this method
     * @throws \MailChimp\Exception
     */
    public function campaignSegmentTest()
    {
        throw new \MailChimp\Exception('This method has not yet been implemented');
    }
    
    /**
     * Send a given campaign immediately
     * @link http://apidocs.mailchimp.com/api/1.3/campaignsendnow.func.php
     * @param string $id The ID of the campaign to send
     * @return bool
     */
    public function campaignSendNow($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignSendNow', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Send a test of this campaign to the provided email address
     * @link http://apidocs.mailchimp.com/api/1.3/campaignsendtest.func.php
     * @param string $id The campaign ID to test
     * @param string|array $emails An email address (or array of addresses) to receive the test message
     * @param null|string $type One of null (send both formats), 'html' or 'text'
     * @return bool
     */
    public function campaignSendTest($id, $emails, $type = null)
    {
        // Prepare the parameters array
        $params = array(
            'cid' => $id,
            'test_emails' => (array) $emails,
            'send_type' => $type,
        );
        
        // Build the request URL
        $request = $this->client->prepare('campaignSendTest', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Get the URL to a customized VIP Report for the specified campaign
     * Optionally send an email to email address(es) with links to it
     * Note: Theme ID's must be grabbed from https://admin.mailchimp.com/account/cobranding/
     * by inspecting the list of themes and grabbing the "theme" attribute
     * @link http://apidocs.mailchimp.com/api/1.3/campaignsharereport.func.php
     * @param array $emails Array of email addresses to receive the link
     * @param null|string A company name to be displayed
     * @param string $theme Either a global or a user-specific theme ID
     * @param string $css A link to an external CSS file to be included
     * @return stdClass
     */
    public function campaignShareReport($id, array $emails = array(), $company = null, $theme = null, $css = null)
    {
        // Prepare the parameters array
        $params = array(
            'cid' => $id,
            'to_email' => implode(',', $emails),
            'company' => $company,
            'theme_id' => $theme,
            'css_url' => $css,
        );
        
        // Build the request URL
        $request = $this->client->prepare('campaignShareReport', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Get the HTML template content sections for a campaign
     * http://apidocs.mailchimp.com/api/1.3/campaigntemplatecontent.func.php
     * @param string $id The campaign ID to get template content for
     * @return stdClass
     */
    public function campaignTemplateContent($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignTemplateContent', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Unschedule a campaign that is scheduled to be sent in the future
     * @link http://apidocs.mailchimp.com/api/1.3/campaignunschedule.func.php
     * @param string $id The campaign ID to be unscheduled
     * @return bool
     */
    public function campaignUnschedule($id)
    {
        // Build the request URL
        $request = $this->client->prepare('campaignUnschedule', array('cid' => $id));
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Update just about any setting for a campaign that has not been sent
     * @link http://apidocs.mailchimp.com/api/1.3/campaignupdate.func.php
     * @link http://apidocs.mailchimp.com/api/1.3/campaigncreate.func.php
     * @param string $id The campaign ID to update value for
     * @param string $name Parameter name to update (see second link for `options`)
     * @param mixed $value Appropriate value for the parameter
     */
    public function campaignUpdate($id, $name, $value)
    {
        // Prepare the parameters array
        $params = array('cid' => $id, 'name' => $name, 'value' => $value);
        
        // Build the request URL
        $request = $this->client->prepare('campaignUpdate', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Get the list of campaigns and their details matching the specified filters
     * @link http://apidocs.mailchimp.com/api/1.3/campaigns.func.php
     * @param array $filters See link for applicable filters
     * @param int $start Start results at this campaign # (Default: 0)
     * @param int $limit Number of campaigns to return with each call (Default: 25, Max: 1000)
     * @return stdClass
     */
    public function campaigns(array $filters = array(), $start = 0, $limit = 25)
    {
        // Prepare the parameters array
        $params = array('filters' => $filters, 'start' => $start, 'limit' => $limit);
        
        // Build the request URL
        $request = $this->client->prepare('campaigns', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
}
