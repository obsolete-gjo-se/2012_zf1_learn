<?php



use Doctrine\ORM\Mapping as ORM;
use application\models\entities\repositories as Repo;

/**
 * Payvoucher
 *
 * @ORM\Table(name="payvoucher")
 * @ORM\Entity(repositoryClass="Repo\PayvoucherRepository")
 */
class Payvoucher
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
     * @var datetime $timestamp
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    private $timestamp;

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
     * @var Voucher
     *
     * @ORM\OneToOne(targetEntity="Voucher")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="voucher_id", referencedColumnName="id", unique=true, nullable=false)
     * })
     */
    private $voucher;


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
     * Set timestamp
     *
     * @param datetime $timestamp
     * @return Payvoucher
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
     * Set pay
     *
     * @param Pay $pay
     * @return Payvoucher
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

    /**
     * Set voucher
     *
     * @param Voucher $voucher
     * @return Payvoucher
     */
    public function setVoucher(\Voucher $voucher = null)
    {
        $this->voucher = $voucher;
        return $this;
    }

    /**
     * Get voucher
     *
     * @return Voucher 
     */
    public function getVoucher()
    {
        return $this->voucher;
    }
}