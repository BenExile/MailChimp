<?php

/**
 * Handles e-commerce related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

use MailChimp\Client\ClientInterface;
use MailChimp\Object\Ecommerce\OrderInterface;

class Ecommerce extends ManagerAbstract
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
     * Import Ecommerce Order Information to be used for Segmentation
     * @link http://apidocs.mailchimp.com/api/1.3/ecommorderadd.func.php
     * @param OrderInterface $order
     * @return bool
     */
    public function ecommOrderAdd(OrderInterface $order)
    {
        // Prepare the parameters array
        $params = array('order' => $order->prepare());
        
        // Build the request URL
        $request = $this->client->prepare('ecommOrderAdd', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Delete Ecommerce Order Information used for Segmentation
     * @param mixed $storeID The ID of the store
     * @param mixed $orderID The internal (store) order ID to delete
     * @return bool
     */
    public function ecommOrderDel($storeID, $orderID)
    {
        // Prepare the parameters array
        $params = array('store_id' =>$storeID, 'order_id' => $orderID);
        
        // Build the request URL
        $request = $this->client->prepare('ecommOrderDel', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
    
    /**
     * Retrieve the Ecommerce Orders for an account
     * @param int $start The page number to start at (Default: 0)
     * @param int $limit Number of results to return (Default: 100, Max: 500)
     * @param string $since Retrieve orders since this date (YYYY-MM-DD HH:II:SS (GMT))
     * @return stdClass
     */
    public function ecommOrders($start = 0, $limit = 100, $since = null)
    {
        // Prepare the parameters array
        $params = array('start' =>$start, 'limit' => $limit, 'since' => $since);
        
        // Build the request URL
        $request = $this->client->prepare('ecommOrders', $params);
        
        // Return the API response
        return $this->client->request($request);
    }
}
