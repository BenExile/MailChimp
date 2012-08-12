<?php

/**
 * Handles golden monkeys related API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Manager
 */
namespace MailChimp\Manager;

abstract class ManagerAbstract
{
    /**
     * API client
     * @var null|ClientInterface
     */
    protected $client = null;
}
