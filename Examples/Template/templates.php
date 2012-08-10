<?php

/**
 * Example of the templates() API call
 * @link http://apidocs.mailchimp.com/api/1.3/templates.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$templateManager = $mailchimp->getManager('Template');

// List available templates in the system using default options
$templates = $templateManager->templates();

// Dump the output (stdClass)
var_dump($templates);
