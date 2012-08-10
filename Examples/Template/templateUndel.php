<?php

/**
 * Example of the templateUndel() API call
 * @link http://apidocs.mailchimp.com/api/1.3/templateundel.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$templateManager = $mailchimp->getManager('Template');

$id = 0; // ID of the template you wish to reactivate

// Reactivate the template with ID # $id
$undel = $templateManager->templateUndel($id);

// Dump the output (bool)
var_dump($undel);
