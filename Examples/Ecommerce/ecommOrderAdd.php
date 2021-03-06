<?php

/**
 * Example of the ecommOrderAdd() API call
 * @link http://apidocs.mailchimp.com/api/1.3/ecommOrderAdd.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the ecommerce manager object
$ecommManager = $mailchimp->getManager('Ecommerce');

$orderID = ''; // Unique order ID, generated by your ecommerce platform
$campaignID = ''; // Campaign ID (mc_cid) to track order with
$emailID = ''; // Email ID (mc_eid) to attach order to
$storeID = ''; // Unique, user-defined ID for the store sending the order in

// Create an ecommerce order object
$order = new \MailChimp\Object\Ecommerce\Order($orderID, $campaignID, $emailID, $storeID);

// Define item options
$productID = 123;
$productName = 'ItemOne';
$categoryID = 456;
$categoryName = 'Miscellaneous';
$unitPrice = 100.00;
$quantity = 1;

// Add an item using the options above
$order->addItem($productID, $productName, $categoryID, $categoryName, $unitPrice, $quantity);

// Set shipping and tax (to be calculated by your ecommerce platform)
$order->setShipping(10.00);
$order->setTax(15.00);

// Import Ecommerce Order Information to be used for Segmentation
$ecommAdd = $ecommManager->ecommOrderAdd($order);

// Dump the output
var_dump($ecommAdd);
