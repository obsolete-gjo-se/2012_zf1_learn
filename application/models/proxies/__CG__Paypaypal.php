<?php

namespace application\models\proxies\__CG__;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Paypaypal extends \Paypaypal implements \Doctrine\ORM\Proxy\Proxy
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

    public function setTxnId($txnId)
    {
        $this->__load();
        return parent::setTxnId($txnId);
    }

    public function getTxnId()
    {
        $this->__load();
        return parent::getTxnId();
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

    public function setPaymentDate($paymentDate)
    {
        $this->__load();
        return parent::setPaymentDate($paymentDate);
    }

    public function getPaymentDate()
    {
        $this->__load();
        return parent::getPaymentDate();
    }

    public function setPaymentStatus($paymentStatus)
    {
        $this->__load();
        return parent::setPaymentStatus($paymentStatus);
    }

    public function getPaymentStatus()
    {
        $this->__load();
        return parent::getPaymentStatus();
    }

    public function setPaymentType($paymentType)
    {
        $this->__load();
        return parent::setPaymentType($paymentType);
    }

    public function getPaymentType()
    {
        $this->__load();
        return parent::getPaymentType();
    }

    public function setPendingReason($pendingReason)
    {
        $this->__load();
        return parent::setPendingReason($pendingReason);
    }

    public function getPendingReason()
    {
        $this->__load();
        return parent::getPendingReason();
    }

    public function setReasonCode($reasonCode)
    {
        $this->__load();
        return parent::setReasonCode($reasonCode);
    }

    public function getReasonCode()
    {
        $this->__load();
        return parent::getReasonCode();
    }

    public function setTxnType($txnType)
    {
        $this->__load();
        return parent::setTxnType($txnType);
    }

    public function getTxnType()
    {
        $this->__load();
        return parent::getTxnType();
    }

    public function setPay(\Pay $pay = NULL)
    {
        $this->__load();
        return parent::setPay($pay);
    }

    public function getPay()
    {
        $this->__load();
        return parent::getPay();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'txnId', 'timestamp', 'paymentDate', 'paymentStatus', 'paymentType', 'pendingReason', 'reasonCode', 'txnType', 'pay');
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