<?php

/**
 * Example of the templateUpdate() API call
 * @link http://apidocs.mailchimp.com/api/1.3/templateupdate.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$templateManager = $mailchimp->getManager('Template');

$id = 0; // ID of the template you wish to update
$name = ''; // Updated template name
$html = ''; // Updated template HTML

// Update the template with ID # $id, setting its name and HTML
$update = $templateManager->templateUpdate($id, $name, $html);

// Dump the output (bool)
var_dump($update);
