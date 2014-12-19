<?php

class Application_Model_Entry extends Application_Model_Entity {
    
    protected $_data = array(
        'id' => null, 
        'title' => '', 
        'content' => '', 
        'published_date' => '', 
        'author' => null
    );
    protected $_authorMapperClass = 'Application_Model_AuthorMapper';
    protected $_authorMapper = null;

    public function __set($name, $value){
        if($name == 'author' && ! $value instanceof Application_Model_Author) {
            throw new Application_Model_Exception(
                    'Author can only be set using' . ' an instance of ZFExt_Model_Author');
        }
        parent::__set($name, $value);
    }

    public function __get($name){
        if($name == 'author' && $this->getReferenceId('author') &&
                 ! $this->_data['author'] instanceof Application_Model_Author) {
                    if(! $this->_authorMapper) {
                        $this->_authorMapper = new $this->_authorMapperClass();
                    }
                    $this->_data['author'] = $this->_authorMapper->find(
                            $this->getReferenceId('author'));
                }
                return parent::__get($name);
            }

            public function setAuthorMapper(Application_Model_AuthorMapper $mapper){
                $this->_authorMapper = $mapper;
            }
        }

