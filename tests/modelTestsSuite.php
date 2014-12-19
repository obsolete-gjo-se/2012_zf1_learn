<?php

require_once 'PHPUnit\Framework\TestSuite.php';

require_once 'tests\application\models\AuthorMapperTest.php';

require_once 'tests\application\models\AuthorTest.php';

require_once 'tests\application\models\EntryMapperTest.php';

require_once 'tests\application\models\EntryTest.php';

/**
 * Static test suite.
 */
class modelTestsSuite extends PHPUnit_Framework_TestSuite {

    /**
     * Constructs the test suite handler.
     */
    public function __construct(){
        $this->setName('modelTestsSuite');
        
        $this->addTestSuite('Application_Model_AuthorMapperTest');
        
        $this->addTestSuite('Application_Model_AuthorTest');
        
        $this->addTestSuite('Application_Model_EntryMapperTest');
        
        $this->addTestSuite('Application_Model_EntryTest');
    
    }

    /**
     * Creates the suite.
     */
    public static function suite(){
        return new self();
    }
}

