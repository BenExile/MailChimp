<?php

/**
 * Example of the ecommOrderDel() API call
 * @link http://apidocs.mailchimp.com/api/1.3/ecommorderdel.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the ecommerce manager object
$ecommManager = $mailchimp->getManager('Ecommerce');

$storeID = ''; // Specify the store ID
$orderID = ''; // Specify the order ID

// Delete order ID $orderID sent in by store $storeID
$delete = $ecommManager->ecommOrderDel($storeID, $orderID);

// Dump the output
var_dump($delete);
