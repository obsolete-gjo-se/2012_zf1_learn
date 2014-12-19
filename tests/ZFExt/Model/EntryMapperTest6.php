<?php

/**
 * ok
 * @author Gregory
 *
 */


class ZFExt_Model_EntryMapperTest extends PHPUnit_Framework_TestCase
{
    // ...
    public function testFindsRecordByIdAndReturnsMappedObjectIfExists ()
    {
        $entry = new ZFExt_Model_Entry(
                array('id' => 1, 'title' => 'My Title', 
                        'content' => 'My Content', 
                        'published_date' => '2009-08-17T17:30:00Z'));
        // Erwartetes Rowset-Ergebnis für den gefundenen Eintrag
        $dbData = new stdClass();
        $dbData->id = 1;
        $dbData->title = 'My Title';
        $dbData->content = 'My Content';
        $dbData->published_date = '2009-08-17T17:30:00Z';
        $dbData->author_id = 1;
        // Setze Erwartungen für das Mock-Objekt beim Aufruf von
        // Zend_Db_Table::find()
        $this->_rowset->expects($this->once())
            ->method('current')
            ->will($this->returnValue($dbData));
        $this->_tableGateway->expects($this->once())
            ->method('find')
            ->with($this->equalTo(1))
            ->will($this->returnValue($this->_rowset));
        $mapper = new ZFExt_Model_EntryMapper($this->_tableGateway);
        $result = $mapper->find(1);
        $result2 = $mapper->find(1);
        $this->assertSame($result, $result2);
    }

    public function testSavingNewEntryAddsItToIdentityMap ()
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
        $mapper = new ZFExt_Model_EntryMapper($this->_tableGateway);
        $mapper->save($entry);
        $result = $mapper->find(123);
        $this->assertSame($result, $entry);
    }
    // ...
}