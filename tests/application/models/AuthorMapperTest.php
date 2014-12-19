<?php

class Application_Model_AuthorMapperTest extends PHPUnit_Framework_TestCase {
    
    protected $_tableGateway = null;
    protected $_adapter = null;
    protected $_rowset = null;
    protected $_mapper = null;

    public function setup(){
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, 
                APPLICATION_PATH . '/configs/application.ini');
        $this->_tableGateway = $this->_getCleanMock('Zend_Db_Table_Abstract');
        $this->_adapter = $this->_getCleanMock('Zend_Db_Adapter_Abstract');
        $this->_rowset = $this->_getCleanMock('Zend_Db_Table_Rowset_Abstract');
        $this->_tableGateway->expects($this->any())
            ->method('getAdapter')
            ->will($this->returnValue($this->_adapter));
        $this->_mapper = new Application_Model_AuthorMapper($this->_tableGateway);
    }

    protected function tearDown(){
        parent::tearDown();
    }

    protected function _getCleanMock($className){
        $class = new ReflectionClass($className);
        $methods = $class->getMethods();
        $stubMethods = array();
        foreach ($methods as $method) {
            if($method->isPublic() || ($method->isProtected() && $method->isAbstract())) {
                $stubMethods[] = $method->getName();
            }
        }
        $mocked = $this->getMock($className, $stubMethods, array(), 
                $className . '_AuthorMapperTestMock_' . uniqid(), false);
        return $mocked;
    }

//     public function testCreatesSuitableTableDataGatewayObjectWhenInstantiated(){
//         $mapper = new Application_Model_EntryMapper($this->_tableGateway);
//         $this->assertTrue($mapper->_getGateway() instanceof Zend_Db_Table_Abstract);
//     }
    
    public function testSavesNewAuthorAndSetsAuthorIdOnSave(){
        $author = new Application_Model_Author(
                array(
                    'username' => 'joe_bloggs', 
                    'fullname' => 'Joe Bloggs', 
                    'email' => 'joe@example.com', 
                    'url' => 'http://www.example.com'
                ));
        // Setze Erwartungen für das Mock-Objekt beim Aufruf von
        // Zend_Db_Table::insert()
        $insertionData = array(
            'username' => 'joe_bloggs', 
            'fullname' => 'Joe Bloggs', 
            'email' => 'joe@example.com', 
            'url' => 'http://www.example.com'
        );
        $this->_tableGateway->expects($this->once())
            ->method('insert')
            ->with($this->equalTo($insertionData))
            ->will($this->returnValue(123));
        $this->_mapper->save($author);
        $this->assertEquals(123, $author->id);
    }

    public function testUpdatesExistingAuthor(){
        $author = new Application_Model_Author(
                array(
                    'id' => 2, 
                    'username' => 'joe_bloggs', 
                    'fullname' => 'Joe Bloggs', 
                    'email' => 'joe@example.com', 
                    'url' => 'http://www.example.com'
                ));
        // Setze Erwartungen für das Mock-Objekt beim Aufruf von
        // Zend_Db_Table::update()
        $updateData = array(
            'id' => 2, 
            'username' => 'joe_bloggs', 
            'fullname' => 'Joe Bloggs', 
            'email' => 'joe@example.com', 
            'url' => 'http://www.example.com'
        );
        $this->_adapter->expects($this->once())
            ->method('quoteInto')
            ->will($this->returnValue('id = 2'));
        $this->_tableGateway->expects($this->once())
            ->method('update')
            ->with($this->equalTo($updateData), $this->equalTo('id = 2'));
        $this->_mapper->save($author);
    }

    public function testFindsRecordByIdAndReturnsDomainObject(){
        $author = new Application_Model_Author(
                array(
                    'id' => 1, 
                    'username' => 'joe_bloggs', 
                    'fullname' => 'Joe Bloggs', 
                    'email' => 'joe@example.com', 
                    'url' => 'http://www.example.com'
                ));
        // Erwartetes Rowset-Ergebnis für den gefundenen Eintrag
        $dbData = new stdClass();
        $dbData->id = 1;
        $dbData->fullname = 'Joe Bloggs';
        $dbData->username = 'joe_bloggs';
        $dbData->email = 'joe@example.com';
        $dbData->url = 'http://www.example.com';
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
        $this->assertEquals($author, $entryResult);
    }

    public function testDeletesAuthorUsingEntryId(){
        $this->_adapter->expects($this->once())
            ->method('quoteInto')
            ->with($this->equalTo('id = ?'), $this->equalTo(1))
            ->will($this->returnValue('author_id = 1'));
        $this->_tableGateway->expects($this->once())
            ->method('delete')
            ->with($this->equalTo('id = 1'));
        $this->_mapper->delete(1);
    }

    public function testDeletesAuthorUsingEntryObject(){
        $author = new Application_Model_Author(
                array(
                    'id' => 1, 
                    'username' => 'joe_bloggs', 
                    'fullname' => 'Joe Bloggs', 
                    'email' => 'joe@example.com', 
                    'url' => 'http://www.example.com'
                ));
        $this->_adapter->expects($this->once())
            ->method('quoteInto')
            ->with($this->equalTo('id = ?'), $this->equalTo(1))
            ->will($this->returnValue('author_id = 1'));
        $this->_tableGateway->expects($this->once())
            ->method('delete')
            ->with($this->equalTo('id = 1'));
        $this->_mapper->delete($author);
    }

    public function testFindsRecordByIdAndReturnsMappedObjectIfExists(){
        $author = new Application_Model_Author(
                array(
                    'id' => 1, 
                    'username' => 'joe_bloggs', 
                    'fullname' => 'Joe Bloggs', 
                    'email' => 'joe@example.com', 
                    'url' => 'http://www.example.com'
                ));
        // Erwartetes Rowset-Ergebnis für den gefundenen Eintrag
        $dbData = new stdClass();
        $dbData->id = 1;
        $dbData->fullname = 'Joe Bloggs';
        $dbData->username = 'joe_bloggs';
        $dbData->email = 'joe@example.com';
        $dbData->url = 'http://www.example.com';
        ;
        // Setze Erwartungen für das Mock-Objekt beim Aufruf von
        // Zend_Db_Table::find()
        $this->_rowset->expects($this->once())
            ->method('current')
            ->will($this->returnValue($dbData));
        $this->_tableGateway->expects($this->once())
            ->method('find')
            ->with($this->equalTo(1))
            ->will($this->returnValue($this->_rowset));
        $mapper = new Application_Model_AuthorMapper($this->_tableGateway);
        $result = $mapper->find(1);
        $result2 = $mapper->find(1);
        $this->assertSame($result, $result2);
    }

    public function testSavingNewAuthorAddsItToIdentityMap(){
        $author = new Application_Model_Author(
                array(
                    'username' => 'joe_bloggs', 
                    'fullname' => 'Joe Bloggs', 
                    'email' => 'joe@example.com', 
                    'url' => 'http://www.example.com'
                ));
        // Setze Erwartungen für das Mock-Objekt beim Aufruf von
        // Zend_Db_Table::insert()
        $insertionData = array(
            'username' => 'joe_bloggs', 
            'fullname' => 'Joe Bloggs', 
            'email' => 'joe@example.com', 
            'url' => 'http://www.example.com'
        );
        $this->_tableGateway->expects($this->once())
            ->method('insert')
            ->with($this->equalTo($insertionData))
            ->will($this->returnValue(123));
        $mapper = new Application_Model_AuthorMapper($this->_tableGateway);
        $mapper->save($author);
        $result = $mapper->find(123);
        $this->assertSame($result, $author);
    }

}

