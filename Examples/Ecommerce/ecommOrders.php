<?php

/**
 * Example of the ecommOrders() API call
 * @link http://apidocs.mailchimp.com/api/1.3/ecommorders.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the ecommerce manager object
$ecommManager = $mailchimp->getManager('Ecommerce');

// Get ecommerce orders for the account
$orders = $ecommManager->ecommOrders();

// Dump the output
var_dump($orders);
