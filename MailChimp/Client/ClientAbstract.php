<?php

/**
 * Abstract API client
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Client
 */
namespace MailChimp\Client;

abstract class ClientAbstract
{
    /**
     * MailChimp API version
     * @var float
     */
    private $version = 1.3;
    
    /**
     * MailChimp API Endpoint
     * @var string
     */
    private $endpoint = '%s://%s.api.mailchimp.com/%s/';
    
    /**
     * Use SSL Endpoint
     * If OpenSSL is not loaded, requests will be sent to the API
     * server via a non-secure connection (unless SSL-only mode is active)
     * @var boolean Default: true
     */
    private $useSSL = true;
    
    /**
     * User API key
     * @var string
     */
    private $key = null;
    
    /**
     * Associative array of JSON related errors
     * @var array
     */
    private $jsonErrors = array(
        JSON_ERROR_NONE           => 'No error has occurred',
        JSON_ERROR_DEPTH          => 'The maximum stack depth has been exceeded',
        JSON_ERROR_STATE_MISMATCH => 'Invalid or malformed JSON',
        JSON_ERROR_CTRL_CHAR      => 'Control character error, possibly incorrectly encoded',
        JSON_ERROR_SYNTAX         => 'Syntax error',
        JSON_ERROR_UTF8           => 'Malformed UTF-8 characters, possibly incorrectly encoded',
    );
    
    /**
     * Format the API endpoint and set the API key
     * @param string $key User API key
     * @param bool $secureOnly Only allow API calls to be sent via a secure connection
     * @throws \MailChimp\Exception
     */
    protected function __construct($key, $secureOnly = false)
    {
        // Set the API endpoint
        $this->key = $key;
        $prefix = substr($this->key, strpos($this->key, '-') + 1);
        $protocol = ($this->useSSL && extension_loaded('openssl')) ? 'https' : 'http';
        
        // If SSL-only is enabled, but OpenSSL is not, throw an Exception
        if ($protocol == 'http' && $secureOnly) {
            $message = 'SSL-only mode is active. Please ensure OpenSSL is enabled';
            throw new \MailChimp\Exception($message);
        }
        
        $this->endpoint = sprintf($this->endpoint, $protocol, $prefix, $this->version);
    }
    
    /**
     * Prepare an API request
     * @param string $method API method
     * @param array $params Associative array of request parameters
     * @return string API request URL
     */
    public function prepare($method, array $params = array())
    {
        // Define the default parameters
        $default = array(
            'apikey' => $this->key,
            'method' => $method,
            'output' => 'json',
        );
        
        // Merge the request parameters with the defaults
        $params = array_merge($default, $params);
        
        // Build the request URL
        $query = '?' . http_build_query($params, '', '&');
        $url = $this->endpoint . $query;
        
        // Return the prepared URL
        return $url;
    }
    
    /**
     * Parse an API response
     * @param string $response
     * @throws \MailChimp\Exception
     * @return stdClass
     */
    protected function parse($response)
    {
        if (($response = json_decode($response)) === false) {
            $error = json_last_error();
            $message = 'Unable to decode response. Error: ' . $this->jsonErrors[$error];
            throw new \MailChimp\Exception($message);
        } elseif (isset($response->error, $response->code)) {
            throw new \MailChimp\Exception($response->error, $response->code);
        } else {
            return $response;
        }
    }
}
