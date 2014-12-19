<?php



use Doctrine\ORM\Mapping as ORM;
use application\models\entities\repositories as Repo;

/**
 * Paypaypal
 *
 * @ORM\Table(name="paypaypal")
 * @ORM\Entity(repositoryClass="Repo\PaypaypalRepository")
 */
class Paypaypal
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $txnId
     *
     * @ORM\Column(name="txn_id", type="string", length=30, nullable=false)
     */
    private $txnId;

    /**
     * @var datetime $timestamp
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    private $timestamp;

    /**
     * @var string $paymentDate
     *
     * @ORM\Column(name="payment_date", type="string", length=50, nullable=false)
     */
    private $paymentDate;

    /**
     * @var string $paymentStatus
     *
     * @ORM\Column(name="payment_status", type="string", length=15, nullable=false)
     */
    private $paymentStatus;

    /**
     * @var string $paymentType
     *
     * @ORM\Column(name="payment_type", type="string", length=10, nullable=false)
     */
    private $paymentType;

    /**
     * @var string $pendingReason
     *
     * @ORM\Column(name="pending_reason", type="string", length=10, nullable=true)
     */
    private $pendingReason;

    /**
     * @var string $reasonCode
     *
     * @ORM\Column(name="reason_code", type="string", length=20, nullable=true)
     */
    private $reasonCode;

    /**
     * @var string $txnType
     *
     * @ORM\Column(name="txn_type", type="string", length=20, nullable=false)
     */
    private $txnType;

    /**
     * @var Pay
     *
     * @ORM\OneToOne(targetEntity="Pay")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pay_id", referencedColumnName="id", unique=true, nullable=false)
     * })
     */
    private $pay;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set txnId
     *
     * @param string $txnId
     * @return Paypaypal
     */
    public function setTxnId($txnId)
    {
        $this->txnId = $txnId;
        return $this;
    }

    /**
     * Get txnId
     *
     * @return string 
     */
    public function getTxnId()
    {
        return $this->txnId;
    }

    /**
     * Set timestamp
     *
     * @param datetime $timestamp
     * @return Paypaypal
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * Get timestamp
     *
     * @return datetime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set paymentDate
     *
     * @param string $paymentDate
     * @return Paypaypal
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
        return $this;
    }

    /**
     * Get paymentDate
     *
     * @return string 
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * Set paymentStatus
     *
     * @param string $paymentStatus
     * @return Paypaypal
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
        return $this;
    }

    /**
     * Get paymentStatus
     *
     * @return string 
     */
    public function getPaymentStatus()
    {
        return $this->paymentStatus;
    }

    /**
     * Set paymentType
     *
     * @param string $paymentType
     * @return Paypaypal
     */
    public function setPaymentType($paymentType)
    {
        $this->paymentType = $paymentType;
        return $this;
    }

    /**
     * Get paymentType
     *
     * @return string 
     */
    public function getPaymentType()
    {
        return $this->paymentType;
    }

    /**
     * Set pendingReason
     *
     * @param string $pendingReason
     * @return Paypaypal
     */
    public function setPendingReason($pendingReason)
    {
        $this->pendingReason = $pendingReason;
        return $this;
    }

    /**
     * Get pendingReason
     *
     * @return string 
     */
    public function getPendingReason()
    {
        return $this->pendingReason;
    }

    /**
     * Set reasonCode
     *
     * @param string $reasonCode
     * @return Paypaypal
     */
    public function setReasonCode($reasonCode)
    {
        $this->reasonCode = $reasonCode;
        return $this;
    }

    /**
     * Get reasonCode
     *
     * @return string 
     */
    public function getReasonCode()
    {
        return $this->reasonCode;
    }

    /**
     * Set txnType
     *
     * @param string $txnType
     * @return Paypaypal
     */
    public function setTxnType($txnType)
    {
        $this->txnType = $txnType;
        return $this;
    }

    /**
     * Get txnType
     *
     * @return string 
     */
    public function getTxnType()
    {
        return $this->txnType;
    }

    /**
     * Set pay
     *
     * @param Pay $pay
     * @return Paypaypal
     */
    public function setPay(\Pay $pay = null)
    {
        $this->pay = $pay;
        return $this;
    }

    /**
     * Get pay
     *
     * @return Pay 
     */
    public function getPay()
    {
        return $this->pay;
    }
}