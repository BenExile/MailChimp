<?php

/**
 * Ecommerce order object
 * This class does not provide any means of calculating tax or shipping - this
 * will be done by your ecommerce platform. This class simply handles the values
 * passed to it and prepares them for use in a campaignEcommOrderAdd() API call
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Ecommerce
 */
namespace MailChimp\Object\Ecommerce;

class Order extends OrderAbstract
{
    /**
     * Set the order ID, email of subscriber to attach the order to and order date
     * @param string $orderID The store's internal ID for the order
     * @param string $campaignID The mc_cid recorded from an email click
     * @param string $emailID The mc_eid recorded from an email click
     * @param string $storeID The unique, user-defined ID for the store sending the order in
     * @param string $storeName Optional "nice" store name for associated $storeID
     * @param null|string $date
     */
    public function __construct($orderID, $campaignID, $emailID, $storeID, $storeName = null, $date = null)
    {
        $this->orderID = $orderID;
        $this->campaignID = $campaignID;
        $this->emailID = $emailID;
        $this->storeID = $storeID;
        $this->storeName = $storeName;
        $this->date = $date;
    }
    
    /**
     * Add an item to the order
     * @param int $prodID The store's internal ID for the product
     * @param string $prodName The product name for the $prodID associated with this item
     * @param int $catID The store's internal ID for the category associated with this product
     * @param string $catName The category name for the $catID this product is in
     * @param double $cost The cost of a single item, not the total cost of the line
     * @param int $qty The quantity of the item ordered
     * @param string $sku The store's internal SKU for the product ($prodID is used if this is not passed)
     * @param int $lineNo  Line number of the item on the order (Auto-generated if not passed)
     * @return void
     */
    public function addItem($prodID, $prodName, $catID, $catName, $cost, $qty, $sku = null, $lineNo = null)
    {
        // Add the item to the array
        $this->items[] = array(
            'line_num' => $lineNo,
            'product_id' => $prodID,
            'sku' => (isset($sku)) ? $sku : $prodID,
            'product_name' => $prodName,
            'category_id' => $catID,
            'category_name' => $catName,
            'qty' => $qty,
            'cost' => $cost,
        );
        
        // Add the cost of item ($cost * $qty) to the items total
        $this->itemsCost += ($cost * $qty);
    }
    
    /**
     * Set the cost of shipping this order
     * @param double $shipping
     * @throws \MailChimp\Exception
     * @return void
     */
    public function setShipping($shipping)
    {
        if (!is_numeric($shipping)) {
            throw new \MailChimp\Exception('Shipping cost must be a numeric value');
        } else {
            $this->shipping = $shipping;
        }
    }
    
    /**
     * Set the total tax paid on this order
     * @param double $tax
     * @throws \MailChimp\Exception
     * @return void
     */
    public function setTax($tax)
    {
        if (!is_numeric($tax)) {
            throw new \MailChimp\Exception('Tax must be a numeric value');
        } else {
            $this->tax = $tax;
        }
    }
    
    /**
     * Prepare the order parameters for use in an API call
     * @return array
     */
    public function prepare()
    {
        // Check the order has at least one item
        if (empty($this->items)) {
            throw new \MailChimp\Exception('An order must have at least one item');
        }
        
        // Prepare the parameters array
        $params = array(
            'id' => $this->orderID,
            'email_id' => $this->emailID,
            'total' => $this->itemsCost + $this->shipping + $this->tax,
            'order_date' => $this->date,
            'shipping' => $this->shipping,
            'tax' => $this->tax,
            'store_id' => $this->storeID,
            'store_name' => $this->storeName,
            'campaign_id' => $this->campaignID,
            'items' => $this->items,
        );
        
        // Return the ecommerce order
        return $params;
    }
}
