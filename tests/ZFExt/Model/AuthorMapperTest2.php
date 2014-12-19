<?php

/**
 * ok
 * @author Gregory
 *
 */


class ZFExt_Model_AuthorMapperTest extends PHPUnit_Framework_TestCase
{
    // ...
    public function testFindsRecordByIdAndReturnsMappedObjectIfExists ()
    {
        $author = new ZFExt_Model_Author(
                array('id' => 1, 'username' => 'joe_bloggs', 
                        'fullname' => 'Joe Bloggs', 'email' => 'joe@example.com', 
                        'url' => 'http://www.example.com'));
        // Erwartetes Rowset-Ergebnis f�r den gefundenen Eintrag
        $dbData = new stdClass();
        $dbData->id = 1;
        $dbData->fullname = 'Joe Bloggs';
        $dbData->username = 'joe_bloggs';
        $dbData->email = 'joe@example.com';
        $dbData->url = 'http://www.example.com';
        ;
        // Setze Erwartungen f�r das Mock-Objekt beim Aufruf von
        // Zend_Db_Table::find()
        $this->_rowset->expects($this->once())
            ->method('current')
            ->will($this->returnValue($dbData));
        $this->_tableGateway->expects($this->once())
            ->method('find')
            ->with($this->equalTo(1))
            ->will($this->returnValue($this->_rowset));
        $mapper = new ZFExt_Model_AuthorMapper($this->_tableGateway);
        $result = $mapper->find(1);
        $result2 = $mapper->find(1);
        $this->assertSame($result, $result2);
    }

    public function testSavingNewAuthorAddsItToIdentityMap ()
    {
        $author = new ZFExt_Model_Author(
                array('username' => 'joe_bloggs', 'fullname' => 'Joe Bloggs', 
                        'email' => 'joe@example.com', 
                        'url' => 'http://www.example.com'));
        // Setze Erwartungen f�r das Mock-Objekt beim Aufruf von
        // Zend_Db_Table::insert()
        $insertionData = array('username' => 'joe_bloggs', 
                'fullname' => 'Joe Bloggs', 'email' => 'joe@example.com', 
                'url' => 'http://www.example.com');
        $this->_tableGateway->expects($this->once())
            ->method('insert')
            ->with($this->equalTo($insertionData))
            ->will($this->returnValue(123));
        $mapper = new ZFExt_Model_AuthorMapper($this->_tableGateway);
        $mapper->save($author);
        $result = $mapper->find(123);
        $this->assertSame($result, $author);
    }
    // ...
}