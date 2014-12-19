<?php

/**
 * ok
 * @author Gregory
 *
 */

class ZFExt_Model_EntryMapperTest extends PHPUnit_Framework_TestCase
{
    // ...
    public function testFindsRecordByIdAndReturnsDomainObject ()
    {
        $author = new ZFExt_Model_Author(
                array('id' => 1, 'username' => 'joe_bloggs', 
                        'fullname' => 'Joe Bloggs', 'email' => 'joe@example.com', 
                        'url' => 'http://www.example.com'));
        $entry = new ZFExt_Model_Entry(
                array('id' => 1, 'title' => 'My Title', 
                        'content' => 'My Content', 
                        'published_date' => '2009-08-17T17:30:00Z', 
                        'author' => $author));
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
        // Erstelle ein Mock-Objekt von AuthorMapper - es hat eigene Tests
        $authorMapper = $this->_getCleanMock('ZFExt_Model_AuthorMapper');
        $authorMapper->expects($this->once())
            ->method('find')
            ->with($this->equalTo(1))
            ->will($this->returnValue($author));
        $this->_mapper->setAuthorMapper($authorMapper);
        $entryResult = $this->_mapper->find(1);
        $this->assertEquals($entry, $entryResult);
    }

    public function testDeletesEntryUsingEntryId ()
    {
        $this->_adapter->expects($this->once())
            ->method('quoteInto')
            ->with($this->equalTo('id = ?'), $this->equalTo(1))
            ->will($this->returnValue('entry_id = 1'));
        $this->_tableGateway->expects($this->once())
            ->method('delete')
            ->with($this->equalTo('id = 1'));
        $this->_mapper->delete(1);
    }

    public function testDeletesEntryUsingEntryObject ()
    {
        $author = new ZFExt_Model_Author(
                array('id' => 2, 'username' => 'joe_bloggs', 
                        'fullname' => 'Joe Bloggs', 'email' => 'joe@example.com', 
                        'url' => 'http://www.example.com'));
        $entry = new ZFExt_Model_Entry(
                array('id' => 1, 'title' => 'My Title', 
                        'content' => 'My Content', 
                        'published_date' => '2009-08-17T17:30:00Z', 
                        'author' => $author));
        $this->_adapter->expects($this->once())
            ->method('quoteInto')
            ->with($this->equalTo('id = ?'), $this->equalTo(1))
            ->will($this->returnValue('entry_id = 1'));
        $this->_tableGateway->expects($this->once())
            ->method('delete')
            ->with($this->equalTo('id = 1'));
        $this->_mapper->delete($entry);
    }
    // ...
}