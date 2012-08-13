<?php

/**
 * Example of the folderUpdate() API call
 * @link http://apidocs.mailchimp.com/api/1.3/folderupdate.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the folder manager object
$folderManager = $mailchimp->getManager('Folder');

$id = 0; // Specify the folder to update
$name = 'API Test Folder Renamed'; // New name for the folder

// Update the folder with ID $id
$update = $folderManager->folderUpdate($id, $name);

// Dump the output
var_dump($update);
