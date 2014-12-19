<?php



use Doctrine\ORM\Mapping as ORM;
use application\models\entities\repositories as Repo;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="Repo\ItemBuyRepository")
 */
class Item
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
     * @var string $itemName
     *
     * @ORM\Column(name="itemname", type="string", length=100, nullable=false)
     */
    private $itemName;

    /**
     * @var string $descr
     *
     * @ORM\Column(name="descr", type="string", length=255, nullable=true)
     */
    private $descr;

    /**
     * @var decimal $amount
     *     
     *@ORM\Column(name="amount", type="decimal", scale=2, precision=5, nullable=false)
     */
    private $amount;

    /**
     * @var string $currencyCode
     *
     * @ORM\Column(name="currencycode", type="string", length=5, nullable=false)
     */
    private $currencyCode;


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
     * Set name
     *
     * @param string $name
     * @return Item
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set desc
     *
     * @param string $desc
     * @return Item
     */
    public function setDescr($descr)
    {
        $this->desc = $descr;
        return $this;
    }

    /**
     * Get desc
     *
     * @return string 
     */
    public function getDescr()
    {
        return $this->desc;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Item
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set currencyCode
     *
     * @param string $currencyCode
     * @return Item
     */
    public function setCurrencyCode($currencyCode)
    {
        $this->currencyCode = $currencyCode;
        return $this;
    }

    /**
     * Get currencyCode
     *
     * @return string 
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }
}