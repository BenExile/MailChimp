<?php

/**
 * Example of the templateAdd() API call
 * @link http://apidocs.mailchimp.com/api/1.3/templateadd.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$templateManager = $mailchimp->getManager('Template');

$name = 'Hello World'; // Name of your template
$html = 'Lorem ipsum dolor sit amet'; // HTML content of your template

// Pull info for the template with ID # $id
$template = $templateManager->templateAdd($name, $html);

// Dump the output (int)
var_dump($template);
