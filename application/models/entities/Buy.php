<?php

use Doctrine\ORM\Mapping as ORM;
use application\models\entities\repositories as Repo;

/**
 * Buy
 *
 * @ORM\Table(name="buy")
 * @ORM\Entity(repositoryClass="Repo\BuyRepository")
 */
class Buy {
    /**
     *
     * @var integer $id
     *     
     *      @ORM\Column(name="id", type="integer", nullable=false)
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     *
     * @var string $invoice
     *     
     *      @ORM\Column(name="invoice", type="string", length=50,
     *      nullable=false)
     */
    private $invoice;
    
    /**
     *
     * @var datetime $timestamp
     *     
     *      @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    private $timestamp;
    
    /**
     *
     * @var string $itemName
     *     
     *      @ORM\Column(name="itemname", type="string", length=100,
     *      nullable=false)
     */
    private $itemName;
    
    /**
     *
     * @var string $descr
     *     
     *      @ORM\Column(name="descr", type="string", length=255, nullable=true)
     */
    private $descr;
    
    /**
     *
     * @var decimal $amount
     *     
     *      @ORM\Column(name="amount", type="decimal", scale=2, precision=5,
     *      nullable=false)
     */
    private $amount;
    
    /**
     *
     * @var string $currencyCode
     *     
     *      @ORM\Column(name="currencycode", type="string", length=5,
     *      nullable=false)
     */
    private $currencyCode;
    
    /**
     *
     * @var Item @ORM\OneToOne(targetEntity="Item")
     *      @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="item_id", referencedColumnName="id",
     *      unique=true, nullable=false)
     *      })
     */
    private $item;
    
    /**
     *
     * @var Ptestdate @ORM\OneToOne(targetEntity="Ptestdate")
     *      @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="ptestdate_id", referencedColumnName="id",
     *      unique=true, nullable=false)
     *      })
     */
    private $ptestdate;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Set invoice
     *
     * @param $invoice string           
     * @return Buy
     */
    public function setInvoice($invoice){
        $this->invoice = $invoice;
        return $this;
    }

    /**
     * Get invoice
     *
     * @return string
     */
    public function getInvoice(){
        return $this->invoice;
    }

    /**
     * Set timestamp
     *
     * @param $timestamp datetime           
     * @return Buy
     */
    public function setTimestamp($timestamp){
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * Get timestamp
     *
     * @return datetime
     */
    public function getTimestamp(){
        return $this->timestamp;
    }

    /**
     * Set itemName
     *
     * @param $itemName string           
     * @return Buy
     */
    public function setItemName($itemName){
        $this->itemName = $itemName;
        return $this;
    }

    /**
     * Get itemName
     *
     * @return string
     */
    public function getItemName(){
        return $this->itemName;
    }

    /**
     * Set desc
     *
     * @param $desc string           
     * @return Item
     */
    public function setDescr($descr){
        $this->desc = $descr;
        return $this;
    }

    /**
     * Get desc
     *
     * @return string
     */
    public function getDescr(){
        return $this->desc;
    }

    /**
     * Set amount
     *
     * @param $amount float           
     * @return Buy
     */
    public function setAmount($amount){
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount(){
        return $this->amount;
    }

    /**
     * Set currencyCode
     *
     * @param $currencyCode string           
     * @return Buy
     */
    public function setCurrencyCode($currencyCode){
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * Get currencyCode
     *
     * @return string
     */
    public function getCurrencyCode(){
        return $this->currencyCode;
    }

    /**
     * Set item
     *
     * @param $item Item           
     * @return Buy
     */
    public function setItem(\Item $item = null){
        $this->item = $item;
        return $this;
    }

    /**
     * Get item
     *
     * @return Item
     */
    public function getItem(){
        return $this->item;
    }

    /**
     * Set ptestdate
     *
     * @param $ptestdate Ptestdate           
     * @return Buy
     */
    public function setPtestdate(\Ptestdate $ptestdate = null){
        $this->ptestdate = $ptestdate;
        return $this;
    }

    /**
     * Get ptestdate
     *
     * @return Ptestdate
     */
    public function getPtestdate(){
        return $this->ptestdate;
    }
}