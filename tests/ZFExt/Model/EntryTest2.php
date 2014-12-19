<?php

// ok

require_once 'ZFExt/Model/Entry.php';

class ZFExt_Model_EntryTest extends PHPUnit_Framework_TestCase
{
    // ...
    public function testReturnsIssetStatusOfProperties ()
    {
        
        $entry = new ZFExt_Model_Entry();
        $entry->title = 'My Title';
        $this->assertTrue(isset($entry->title));
    }

    public function testCanUnsetAnyProperties ()
    {
        $entry = new ZFExt_Model_Entry();
        $entry->title = 'My Title';
        unset($entry->title);
        $this->assertFalse(isset($entry->title));
    }
}