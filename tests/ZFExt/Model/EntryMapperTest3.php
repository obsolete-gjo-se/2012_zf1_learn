<?php

class ZFExt_Model_EntryMapperTest extends PHPUnit_Framework_TestCase
{
    // ...
    public function testUpdatesExistingEntry ()
    {
        $author = new ZFExt_Model_Author(
                array('id' => 2, 'name' => 'Joe Bloggs', 
                        'email' => 'joe@example.com', 
                        'url' => 'http://www.example.com'));
        $entry = new ZFExt_Model_Entry(
                array('id' => 1, 'title' => 'My Title', 
                        'content' => 'My Content', 
                        'published_date' => '2009-08-17T17:30:00Z', 
                        'author' => $author));
        
        // Setze Erwartungen für Parameter des Adapters zu maskieren
        $this->_adapter->expects($this->once())
            ->method('quoteInto')
            ->will($this->returnValue('id = 1'));
        $this->_tableGateway->expects($this->once())
            ->method('update')
            ->with($this->equalTo($updateData), $this->equalTo('id = 1'));
        $this->_mapper->save($entry);
    }
    // ...
}