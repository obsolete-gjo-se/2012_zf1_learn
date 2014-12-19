<?php

class ZFExt_Model_EntryMapperTest extends PHPUnit_Framework_TestCase
{
    // ...
    
    public function testSavesNewEntryAndSetsEntryIdOnSave ()
    {
        $author = new ZFExt_Model_Author(
                array('id' => 2, 'username' => 'joe_bloggs', 
                        'fullname' => 'Joe Bloggs', 'email' => 'joe@example.com', 
                        'url' => 'http://www.example.com'));
        $entry = new ZFExt_Model_Entry(
                array('title' => 'My Title', 'content' => 'My Content', 
                        'published_date' => '2009-08-17T17:30:00Z', 
                        'author' => $author));
        
        // Setze Erwartungen für das Mock-Objekt beim Aufruf von
        // Zend_Db_Table::insert()
        
        $insertionData = array('title' => 'My Title', 'content' => 'My Content', 
                'published_date' => '2009-08-17T17:30:00Z', 'author_id' => 2);
        $this->_tableGateway->expects($this->once())
            ->method('insert')
            ->with($this->equalTo($insertionData))
            ->will($this->returnValue(123));
        $this->_mapper->save($entry);
        $this->assertEquals(123, $entry->id);
    }
    
    // ...

}