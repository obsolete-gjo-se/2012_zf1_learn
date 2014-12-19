<?php

namespace application\models\proxies\__CG__;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Buy extends \Buy implements \Doctrine\ORM\Proxy\Proxy
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

    public function setInvoice($invoice)
    {
        $this->__load();
        return parent::setInvoice($invoice);
    }

    public function getInvoice()
    {
        $this->__load();
        return parent::getInvoice();
    }

    public function setTimestamp($timestamp)
    {
        $this->__load();
        return parent::setTimestamp($timestamp);
    }

    public function getTimestamp()
    {
        $this->__load();
        return parent::getTimestamp();
    }

    public function setItemName($itemName)
    {
        $this->__load();
        return parent::setItemName($itemName);
    }

    public function getItemName()
    {
        $this->__load();
        return parent::getItemName();
    }

    public function setAmount($amount)
    {
        $this->__load();
        return parent::setAmount($amount);
    }

    public function getAmount()
    {
        $this->__load();
        return parent::getAmount();
    }

    public function setCurrencyCode($currencyCode)
    {
        $this->__load();
        return parent::setCurrencyCode($currencyCode);
    }

    public function getCurrencyCode()
    {
        $this->__load();
        return parent::getCurrencyCode();
    }

    public function setItem(\Item $item = NULL)
    {
        $this->__load();
        return parent::setItem($item);
    }

    public function getItem()
    {
        $this->__load();
        return parent::getItem();
    }

    public function setPtestdate(\Ptestdate $ptestdate = NULL)
    {
        $this->__load();
        return parent::setPtestdate($ptestdate);
    }

    public function getPtestdate()
    {
        $this->__load();
        return parent::getPtestdate();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'invoice', 'timestamp', 'itemName', 'amount', 'currencyCode', 'item', 'ptestdate');
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