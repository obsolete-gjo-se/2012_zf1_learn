<?php
class Application_ExampleTestsCode extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp ()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV,
                APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }


    public function test_falseIfNoAtSign ()
    {
        $actual = Application_Model_Example::checkEmail('manuel.kiessling.net');
        $this->assertFalse($actual);
    }

    public function test_trueIfAtSign ()
    {
        $actual = Application_Model_Example::checkEmail('manuel@kiessling.net');
        $this->assertTrue($actual, 'der Fehler liegt hier!');
    }


    public function testIndexActionShouldContainLoginForm()
    {
        $this->dispatch('/user');
        $this->assertAction('index');
        $this->assertQueryCount('form#loginForm', 1);
    }
    
    public function testValidLoginShouldGoToProfilePage()
    {
        $this->request->setMethod('POST')
        ->setPost(array(
                'username' => 'foobar',
                'password' => 'foobar'
        ));
        $this->dispatch('/user/login');
        $this->assertRedirectTo('/user/view');
    
        $this->resetRequest()
        ->resetResponse();
    
        $this->request->setMethod('GET')
        ->setPost(array());
        $this->dispatch('/user/view');
        $this->assertRoute('default');
        $this->assertModule('default');
        $this->assertController('user');
        $this->assertAction('view');
        $this->assertNotRedirect();
        $this->assertQuery('dl');
        $this->assertQueryContentContains('h2', 'User: foobar');
    }
    
    public function testNewArrayIsEmpty()
    {
        // Create the Array fixture.
        $fixture = array();
    
        // Assert that the size of the Array fixture is 0.
        $this->assertEquals(0, sizeof($fixture));
    }
    
    public function testArrayContainsAnElement()
    {
        // Create the Array fixture.
        $fixture = array();
    
        // Add an element to the Array fixture.
        $fixture[] = 'Element';
    
        // Assert that the size of the Array fixture is 1.
        $this->assertEquals(1, sizeof($fixture));
    }



}
