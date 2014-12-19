<?php

class Application_Model_EntryTest extends PHPUnit_Framework_TestCase {

    public function setUp(){
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, 
                APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    protected function tearDown(){
        // TODO Auto-generated Test::tearDown()
        
        parent::tearDown();
    }

    /**
     * Dieser Test besteht immer, auch ohne Code in Klasse!
     */
    public function testSetsAllowedDomainObjectProperty(){
        $entry = new Application_Model_Entry();
        $entry->title = 'Mein Titel';
        $this->assertEquals('Mein Titel', $entry->title);
    }

    /**
     * der ist ok, Besonderheit ist 'id' im Array, ist aber richtig, wird nicht
     * geschrieben, nur gelesen
     */
    public function testConstructorInjectionOfProperties(){
        $data = array(
            'title' => 'My Title', 
            'content' => 'My Content', 
            'published_date' => '2009-08-17T17:30:00Z', 
            'author' => new Application_Model_Author()
        );
        $entry = new Application_Model_Entry($data);
        $expected = $data;
        $expected['id'] = null;
        $this->assertEquals($expected, $entry->toArray());
    }

    /**
     * Test abgeändert:
     * - Eigenschaft auf NULL setzen
     * - Wert setzen
     * - Erwartung Wert gesetzt
     */
    public function testReturnsIssetStatusOfProperties(){
        $entry = new Application_Model_Entry();
        $entry->title = null;
        $entry->title = 'Mein Titel';
        $this->assertTrue(isset($entry->title));
    }

    public function testCanUnsetAnyProperties(){
        $entry = new Application_Model_Entry();
        $entry->title = 'My Title';
        unset($entry->title);
        $this->assertFalse(isset($entry->title));
    }

    public function testCannotSetNewPropertiesUnlessDefinedForDomainObject(){
        $entry = new Application_Model_Entry();
        try {
            $entry->notdefined = 1;
            $this->fail(
                    'Setting new property not defined in class should' . ' have raised an Exception');
        } catch (Application_Model_Exception $e) {}
    }

    public function testThrowsExceptionIfAuthorNotAnAuthorEntityObject(){
        $entry = new Application_Model_Entry();
        try {
            $entry->author = 1;
            $this->fail(
                    'Setting author should have raised an Exception' .
                             ' since value was not an instance of Application_Model_Author');
        } catch (Application_Model_Exception $e) {}
    }

    public function testAllowsAuthorIdToBeStoredAsAReference(){
        $entry = new Application_Model_Entry();
        $entry->setReferenceId('author', 5);
        $this->assertEquals(5, $entry->getReferenceId('author'));
    }

    public function testLazyLoadingAuthorsRetrievesAuthorDomainObject(){
        $author = new Application_Model_Author(
                array(
                    'id' => 5, 
                    'username' => 'joe_bloggs', 
                    'fullname' => 'Joe Bloggs', 
                    'email' => 'joe@example.com', 
                    'url' => 'http://www.example.com'
                ));
        $entry = new Application_Model_Entry();
        $entry->setReferenceId('author', 5);
        $authorMapper = $this->_getCleanMock('Application_Model_AuthorMapper');
        $authorMapper->expects($this->once())
            ->method('find')
            ->with($this->equalTo(5))
            ->will($this->returnValue($author));
        $entry->setAuthorMapper($authorMapper);
        $this->assertEquals('Joe Bloggs', $entry->author->fullname);
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
                $className . '_EntryTestMock_' . uniqid(), false);
        return $mocked;
    }
}

