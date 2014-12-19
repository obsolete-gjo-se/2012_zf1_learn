<?php

/**
 * ok
 * @author Gregory
 *
 */

class ZFExt_Model_EntryTest extends PHPUnit_Framework_TestCase
{
    // ...
    
    public function testAllowsAuthorIdToBeStoredAsAReference ()
    {
        $entry = new ZFExt_Model_Entry();
        $entry->setReferenceId('author', 5);
        $this->assertEquals(5, $entry->getReferenceId('author'));
    }

    public function testLazyLoadingAuthorsRetrievesAuthorDomainObject ()
    {
        $author = new ZFExt_Model_Author(
                array('id' => 5, 'username' => 'joe_bloggs', 
                        'fullname' => 'Joe Bloggs', 'email' => 'joe@example.com', 
                        'url' => 'http://www.example.com'));
        $entry = new ZFExt_Model_Entry();
        $entry->setReferenceId('author', 5);
        $authorMapper = $this->_getCleanMock('ZFExt_Model_AuthorMapper');
        $authorMapper->expects($this->once())
            ->method('find')
            ->with($this->equalTo(5))
            ->will($this->returnValue($author));
        $entry->setAuthorMapper($authorMapper);
        $this->assertEquals('Joe Bloggs', $entry->author->fullname);
    }

    protected function _getCleanMock ($className)
    {
        $class = new ReflectionClass($className);
        $methods = $class->getMethods();
        $stubMethods = array();
        foreach ($methods as $method) {
            if ($method->isPublic() ||
                     ($method->isProtected() && $method->isAbstract())) {
                        $stubMethods[] = $method->getName();
                    }
                }
                $mocked = $this->getMock($className, $stubMethods, array(), 
                        $className . '_EntryTestMock_' . uniqid(), false);
                return $mocked;
            }
            // ...
        }