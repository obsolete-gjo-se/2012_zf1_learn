<?php

use Doctrine\ORM\Mapping as ORM;
use application\models\entities\repositories as Repo;

/**
 * Pay
 *
 * @ORM\Table(name="pay")
 * @ORM\Entity(repositoryClass="Repo\PayRepository")
 */
class Pay {
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
     * @var string $method
     *     
     *      @ORM\Column(name="method", type="string", length=20, nullable=false)
     */
    private $method;
    
    /**
     *
     * @var boolean $status
     *     
     *      @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;
    
    /**
     *
     * @var Buy @ORM\OneToOne(targetEntity="Buy")
     *      @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="buy_id", referencedColumnName="id",
     *      unique=true, nullable=false)
     *      })
     */
    private $buy;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId(){
        return $this->id;
    }

    /**
     * Set method
     *
     * @param $method string           
     * @return Pay
     */
    public function setMethod($method){
        $this->method = $method;
        return $this;
    }

    /**
     * Get method
     *
     * @return string
     */
    public function getMethod(){
        return $this->method;
    }

    /**
     * Set status
     *
     * @param $status boolean           
     * @return Pay
     */
    public function setStatus($status){
        $this->status = $status;
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus(){
        return $this->status;
    }

    /**
     * Set buy
     *
     * @param $buy Buy           
     * @return Pay
     */
    public function setBuy(\Buy $buy = null){
        $this->buy = $buy;
        return $this;
    }

    /**
     * Get buy
     *
     * @return Buy
     */
    public function getBuy(){
        return $this->buy;
    }
}