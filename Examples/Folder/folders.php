<?php

/**
 * Example of the folders() API call
 * @link http://apidocs.mailchimp.com/api/1.3/folders.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the folder manager object
$folderManager = $mailchimp->getManager('Folder');

// Get folder for the user account
$folders = $folderManager->folders();

// Dump the output
var_dump($folders);
