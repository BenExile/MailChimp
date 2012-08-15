<?php

/**
 * Segmentation ruleset object
 * Prepare the segmentation conditions for use in
 * campaignSegmentationTest() and campaignCreate() API calls
 * @author Ben Tadiar <ben@handcraftedbyben.co.uk>
 * @package MailChimp
 * @subpackage Segmentation
 */
namespace MailChimp\Object\Segmentation;

class RuleSet implements RuleSetInterface
{
    /**
     * Constant for OR (any) match mode
     * @const string
     */
    const MATCH_ANY = 'any';
    
    /**
     * Constant for AND (all) match mode
     * @const string
     */
    const MATCH_ALL = 'all';
    
    /**
     * Controls whether to use AND or OR when applying rules
     * @see \MailChimp\Object\Segmentation\RuleSet::match()
     * @var string Either 'any' or 'all' (Default: any)
     */
    protected $match = 'any';
    
    /**
     * Array of segmentation conditions
     * Up to 10 conditions per ruleset
     * @var array
     */
    protected $conditions = array();
    
    /**
     * Set the match type used for rules in this set
     * @param string $match Either MATCH_ANY or MATCH_ALL class constants
     * @return \MailChimp\Object\Segmentation\RuleSet $this
     */
    public function match($match)
    {
        // Throw a \MailChimp\Exception if the match type is invalid
        if ($match != self::MATCH_ANY && $match !== self::MATCH_ALL) {
            $message = 'Expected ' . self::MATCH_ANY . ' or ' . self::MATCH_ALL . ', got ' . $match;
            throw new \MailChimp\Exception($message);
        }
        
        // Set the rule match mode
        $this->match = $match;
        
        // Fluent interface
        return $this;
    }
    
    /**
     * Add a condition to the ruleset
     * Up to 10 conditions can be added per ruleset
     * @todo Add methods to handle adding each type of rule
     * @param string $field Criteria to set
     * @param string $operation Operation to perform
     * @param mixed $value Value to check
     * @param null|mixed $extra An extra value used by several fields
     * @return \MailChimp\Object\Segmentation\RuleSet $this
     */
    public function condition($field, $operation, $value, $extra = null)
    {
        // Create the condition , an associative array containing field, op and value
        $condition = array(
            'field' => $field,
            'op' => $operation,
            'value' => $value,
        );
        
        // If the 'extra' value was passed, add it to the condition
        if (isset($extra)) {
            $condition['extra'] = $extra;
        }
        
        // Add the condition to the ruleset
        $this->conditions[] = $condition;
        
        // Fluent interface
        return $this;
    }
    
    /**
     * Prepare the rulset parameters for use in an API call
     * @return array
     */
    public function prepare()
    {
        // Check the rulset has at least one condition
        if (empty($this->conditions)) {
            throw new \MailChimp\Exception('A ruleset must have at least one condition');
        }
        
        // Prepare the parameters array
        $ruleset = array(
            'match' => $this->match,
            'conditions' => $this->conditions,
        );
        
        // Return the ruleset parameters
        return $ruleset;
    }
}
