<?php

/**
 * API client using PHP streams
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Client
 */
namespace MailChimp\Client;

class Stream extends ClientAbstract implements ClientInterface
{
    /**
     * Check that URL-aware fopen wrappers are available
     * @throws \MailChimp\Exception
     */
    public function __construct($key)
    {
        if (!ini_get('allow_url_fopen')) {
            throw new \MailChimp\Exception('The stream client requires URL-aware fopen wrappers. See allow_url_fopen');
        }
        
        // Call the parent constructor
        parent::__construct($key);
    }
    
    /**
     * Send a request to the API server
     * @param string $url API request URL
     * @throws Exception
     * @return stdClass
     */
    public function request($url)
    {
        // Open a file handle
        $handle = fopen($url, 'r');
        
        // Set the initial response
        $response = '';
        
        // Read the response from the stream
        while ($data = fread($handle, 8192)) {
            $response .= $data;
        }
        
        // Close the handle
        fclose($handle);
        
        // Parse the response and return
        return $this->parse($response);
    }
}
