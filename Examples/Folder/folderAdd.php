<?php

/**
 * Example of the folderAdd() API call
 * @link http://apidocs.mailchimp.com/api/1.3/folderadd.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the folder manager object
$folderManager = $mailchimp->getManager('Folder');

// Create a new folder with the name 'API Test Folder'
$folder = $folderManager->folderAdd('API Test Folder');

// Dump the output
var_dump($folder);
