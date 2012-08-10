<?php

/**
 * Example of the inlineCss() API call
 * @link http://apidocs.mailchimp.com/api/1.3/inlinecss.func.php
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 */

// Require the bootstrap
require_once(dirname(__FILE__) . '/../bootstrap.php');

// Retrieve the template manager object
$helperManager = $mailchimp->getManager('Helper');

// Send HTML content to have the CSS inlined and style tags stripped
$html = '<style type="text/css">h1{color:red}</style><h1>Lorem Ipsum</h1><p>Dolor sit amet</p>';
$ping = $helperManager->inlineCss($html, true);

// Dump the output
var_dump($ping);
