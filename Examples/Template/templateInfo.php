<?php

/**
 * Example of the templateInfo() API call
 * @link http://apidocs.mailchimp.com/api/1.3/templateinfo.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$templateManager = $mailchimp->getManager('Template');

$id = 26517; // ID of the template you wish to pull info for

// Pull info for the template with ID # $id
$info = $templateManager->templateInfo($id);

// Dump the output (bool)
var_dump($info);
