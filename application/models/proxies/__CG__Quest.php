<?php

namespace application\models\proxies\__CG__;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Quest extends \Quest implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setShort($short)
    {
        $this->__load();
        return parent::setShort($short);
    }

    public function getShort()
    {
        $this->__load();
        return parent::getShort();
    }

    public function setLong($long)
    {
        $this->__load();
        return parent::setLong($long);
    }

    public function getLong()
    {
        $this->__load();
        return parent::getLong();
    }

    public function setHead($head)
    {
        $this->__load();
        return parent::setHead($head);
    }

    public function getHead()
    {
        $this->__load();
        return parent::getHead();
    }

    public function setPos($positive)
    {
        $this->__load();
        return parent::setPos($positive);
    }

    public function getPos()
    {
        $this->__load();
        return parent::getPos();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'short', 'long', 'head', 'positive');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields AS $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}