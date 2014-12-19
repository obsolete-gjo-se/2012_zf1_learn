<?php

/**
 * ok
 * @author Gregory
 *
 */


class ZFExt_Model_Entity
{

    protected $_references = array();
    // ...
    public function setReferenceId ($name, $id)
    {
        $this->_references[$name] = $id;
    }

    public function getReferenceId ($name)
    {
        if (isset($this->_references[$name])) {
            return $this->_references[$name];
        }
    }
}