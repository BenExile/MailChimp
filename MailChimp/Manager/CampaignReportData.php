<?php

/**
 * Handles campaign report data related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

final class CampaignReportData implements ManagerInterface
{
    /**
     * Set the API client
     * @param unknown_type $client
     */
    public function __construct(\MailChimp\Client\ClientInterface $client)
    {
        $this->client = $client;
    }
}
