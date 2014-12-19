<?php

class Application_Model_AuthorTest extends PHPUnit_Framework_TestCase {

    public function setUp(){
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, 
                APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    protected function tearDown(){
        // Auto-generated Test::tearDown()
        
        parent::tearDown();
    }

    public function testSetsAllowedDomainObjectProperty(){
        $author = new Application_Model_Author();
        $author->fullname = 'Joe';
        $this->assertEquals('Joe', $author->fullname);
    }

    public function testConstructorInjectionOfProperties(){
        $data = array(
            'username' => 'joe_bloggs', 
            'fullname' => 'Joe Bloggs', 
            'email' => 'joe@example.com', 
            'url' => 'http://www.example.com'
        );
        $author = new Application_Model_Author($data);
        $expected = $data;
        $expected['id'] = null;
        $this->assertEquals($expected, $author->toArray());
    }

    public function testReturnsIssetStatusOfProperties(){
        $author = new Application_Model_Author();
        $author->fullname = null;
        $author->fullname = 'Joe Bloggs';
        $this->assertTrue(isset($author->fullname));
    }

    public function testCanUnsetAnyProperties(){
        $author = new Application_Model_Author();
        $author->fullname = 'Joe Bloggs';
        unset($author->fullname);
        $this->assertFalse(isset($author->fullname));
    }

    public function ttestCannotSetNewPropertiesUnlessDefinedForDomainObject(){
        $author = new Application_Model_Author();
        try {
            $author->notdefined = 1;
            $this->fail(
                    'Setting new property not defined in class should' .
                             ' have raised an Exception');
        } catch (Application_Model_Exception $e) {}
    }
    
}

