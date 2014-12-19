<?php



use Doctrine\ORM\Mapping as ORM;
use application\models\entities\repositories as Repo;

/**
 * Voucher
 *
 * @ORM\Table(name="voucher")
 * @ORM\Entity(repositoryClass="Repo\VoucherRepository")
 */
class Voucher
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
     * @var string $str
     *
     * @ORM\Column(name="str", type="string", length=20, nullable=false)
     */
    private $str;

    /**
     * @var boolean $reserv
     *
     * @ORM\Column(name="reserv", type="boolean", nullable=true)
     */
    private $reserv;

    /**
     * @var boolean $used
     *
     * @ORM\Column(name="used", type="boolean", nullable=true)
     */
    private $used;


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
     * Set str
     *
     * @param string $str
     * @return Voucher
     */
    public function setStr($str)
    {
        $this->str = $str;
        return $this;
    }

    /**
     * Get str
     *
     * @return string 
     */
    public function getStr()
    {
        return $this->str;
    }

    /**
     * Set reserv
     *
     * @param boolean $reserv
     * @return Voucher
     */
    public function setReserv($reserv)
    {
        $this->reserv = $reserv;
        return $this;
    }

    /**
     * Get reserv
     *
     * @return boolean 
     */
    public function getReserv()
    {
        return $this->reserv;
    }

    /**
     * Set used
     *
     * @param boolean $used
     * @return Voucher
     */
    public function setUsed($used)
    {
        $this->used = $used;
        return $this;
    }

    /**
     * Get used
     *
     * @return boolean 
     */
    public function getUsed()
    {
        return $this->used;
    }
}