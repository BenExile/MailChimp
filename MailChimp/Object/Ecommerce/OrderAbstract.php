<?php

/**
 * Abstract ecommerce order class
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Ecommerce
 */
namespace MailChimp\Object\Ecommerce;

class OrderABstract implements OrderInterface
{
    /**
     * The store's internal ID for the order
     * @var null|string
     */
    protected $orderID = null;
    
    /**
     * The mc_cid recorded from an email click
     * @var null|string
     */
    protected $campaignID = null;
    
    /**
     * The mc_eid recorded from an email click
     * @var null|string
     */
    protected $emailID = null;
    
    /**
     * The unique, user-defined ID for the store sending the order in
     * @var null|string
     */
    protected $storeID = null;
    
    /**
     * Optional "nice" store name for associated store ID
     * @var null|string
     */
    protected $storeName = null;
    
    /**
     * Date for the order
     * @var string
     */
    protected $date = null;
    
    /**
     * Array of items for the order
     * @var array
     */
    protected $items = array();
    
    /**
     * Total cost for all items
     * @var double
     */
    protected $itemsCost = 0;
    
    /**
     * Cost of shipping this order
     * @var double
     */
    protected $shipping = null;
    
    /**
     * Tax paid on this order
     * @var double
     */
    protected $tax = null;
}
