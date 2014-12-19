<?php

/**
 * ok
 * 
 */

require_once 'ZFExt/Model/Entry.php';

class ZFExt_Model_EntryTest extends PHPUnit_Framework_TestCase
{
    // ...
    
    public function testCannotSetNewPropertiesUnlessDefinedForDomainObject ()
    {
        $entry = new ZFExt_Model_Entry();
        try {
            $entry->notdefined = 1;
            $this->fail(
                    'Setting new property not defined in class should' .
                             ' have raised an Exception');
        } catch (ZFExt_Model_Exception $e) {}
    }
}
