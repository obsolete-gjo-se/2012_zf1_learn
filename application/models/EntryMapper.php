<?php

class Application_Model_EntryMapper extends Application_Model_Mapper {
    
    protected $_tableGateway = null;
    protected $_tableName = 'entries';
    protected $_entityClass = 'Application_Model_Entry';
    protected $_authorMapperClass = 'Application_Model_AuthorMapper';
    protected $_authorMapper = null;

    public function save(Application_Model_Entry $entry){
        if(! $entry->id) {
            $data = array(
                'title' => $entry->title, 
                'content' => $entry->content, 
                'published_date' => $entry->published_date, 
                'author_id' => $entry->author->id
            );
            $entry->id = $this->_getGateway()->insert($data);
            $this->_setIdentity($entry->id, $entry);
            // add new
        } else {
            $data = array(
                'id' => $entry->id, 
                'title' => $entry->title, 
                'content' => $entry->content, 
                'published_date' => $entry->published_date, 
                'author_id' => $entry->author->id
            );
            $where = $this->_getGateway()
                ->getAdapter()
                ->quoteInto('id = ?', $entry->id);
            $this->_getGateway()->update($data, $where);
        }
    }

    public function find($id){
        if($this->_getIdentity($id)) {
            return $this->_getIdentity($id);
        }
        $result = $this->_getGateway()
            ->find($id)
            ->current();
        $entry = new $this->_entityClass(
                array(
                    'id' => $result->id, 
                    'title' => $result->title, 
                    'content' => $result->content, 
                    'published_date' => $result->published_date
                ));
        $entry->setReferenceId('author', $result->author_id);
        $this->_setIdentity($id, $entry);
        // add retrieved
        return $entry;
    }

    public function delete($entry){
        if($entry instanceof Application_Model_Entry) {
            $where = $this->_getGateway()
                ->getAdapter()
                ->quoteInto('id = ?', $entry->id);
        } else {
            $where = $this->_getGateway()
                ->getAdapter()
                ->quoteInto('id = ?', $entry);
        }
        $this->_getGateway()->delete($where);
    }

}

