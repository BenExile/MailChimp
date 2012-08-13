<?php

/**
 * Example of the folderDel() API call
 * @link http://apidocs.mailchimp.com/api/1.3/folderdel.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the folder manager object
$folderManager = $mailchimp->getManager('Folder');

$id = 0; // Specify the folder to delete

// Delete the folder with ID $id
$delete = $folderManager->folderDel($id);

// Dump the output
var_dump($delete);
