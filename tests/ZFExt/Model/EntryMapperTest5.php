<?php

/**
 * 
 * ok
 * @author Gregory
 *
 */


class ZFExt_Model_EntryMapperTest extends PHPUnit_Framework_TestCase
{
    // ...
    public function testFindsRecordByIdAndReturnsDomainObject ()
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
        $entryResult = $this->_mapper->find(1);
        $this->assertEquals('My Title', $entryResult->title);
    }

    public function testFoundRecordCausesAuthorReferenceIdToBeSetOnEntryObject ()
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
        $dbData->author_id = 5;
        // Setze Erwartungen für das Mock-Objekt beim Aufruf von
        // Zend_Db_Table::find()
        $this->_rowset->expects($this->once())
            ->method('current')
            ->will($this->returnValue($dbData));
        $this->_tableGateway->expects($this->once())
            ->method('find')
            ->with($this->equalTo(1))
            ->will($this->returnValue($this->_rowset));
        $entryResult = $this->_mapper->find(1);
        $this->assertEquals(5, $entryResult->getReferenceId('author'));
    }
    // ...
}