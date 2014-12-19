<?php
/**
 * ok
 * @author Gregory
 *
 */

class ZFExt_Model_EntryTest extends PHPUnit_Framework_TestCase
{
    // ...
    
    public function testThrowsExceptionIfAuthorNotAnAuthorEntityObject ()
    {
        $entry = new ZFExt_Model_Entry();
        try {
            $entry->author = 1;
            $this->fail(
                    'Setting author should have raised an Exception' .
                             ' since value was not an instance of ZFExt_Model_Author');
        } catch (ZFExt_Model_Exception $e) {}
    }
}