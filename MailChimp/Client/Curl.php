<?php

/**
 * API client using PHP cURL
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Client
 */
namespace MailChimp\Client;

final class Curl extends ClientAbstract implements ClientInterface
{
    /**
     * cURL options
     * @var array
     */
    private $options = array(
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HEADER         => true,
        CURLOPT_RETURNTRANSFER => true,
    );
    
    /**
     * Check that cURL is enabled
     * @throws \MailChimp\Exception
     */
    public function __construct($key)
    {
        if (!extension_loaded('curl')) {
            throw new \MailChimp\Exception('The cURL client requires the CURL extension');
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
        // Initialise, execute and close a cURL session
        $handle = curl_init($url);
        curl_setopt_array($handle, $this->options);
        $response = curl_exec($handle);
        curl_close($handle);
        
        // Discard response headers
        $headerOffset = strpos($response, "\r\n\r\n") + 1;
        $response = trim(substr($response, $headerOffset));
        
        // Parse the response and return
        return $this->parse($response);
    }
}
