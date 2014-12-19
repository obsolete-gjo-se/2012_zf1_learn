<?php



use Doctrine\ORM\Mapping as ORM;
use application\models\entities\repositories as Repo;

/**
 * Quest
 *
 * @ORM\Table(name="quest")
 * @ORM\Entity(repositoryClass="Repo\QuestRepository")
 */
class Quest
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
     * @var string $short
     *
     * @ORM\Column(name="short", type="string", length=20, nullable=true)
     */
    private $short;

    /**
     * @var string $extensive
     *
     * @ORM\Column(name="extensive", type="string", length=255, nullable=true)
     */
    private $extensive;

    /**
     * @var string $head
     *
     * @ORM\Column(name="head", type="string", length=255, nullable=true)
     */
    private $head;

    /**
     * @var boolean $positive
     *
     * @ORM\Column(name="pos", type="boolean", nullable=true)
     */
    private $positive;


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
     * Set short
     *
     * @param string $short
     * @return Quest
     */
    public function setShort($short)
    {
        $this->short = $short;
        return $this;
    }

    /**
     * Get short
     *
     * @return string 
     */
    public function getShort()
    {
        return $this->short;
    }

    /**
     * Set long
     *
     * @param string $long
     * @return Quest
     */
    public function setExtensive($extensive)
    {
        $this->long = $extensive;
        return $this;
    }

    /**
     * Get extensive
     *
     * @return string 
     */
    public function getExtensive()
    {
        return $this->extensive;
    }

    /**
     * Set head
     *
     * @param string $head
     * @return Quest
     */
    public function setHead($head)
    {
        $this->head = $head;
        return $this;
    }

    /**
     * Get head
     *
     * @return string 
     */
    public function getHead()
    {
        return $this->head;
    }

    /**
     * Set pos
     *
     * @param boolean $pos
     * @return Quest
     */
    public function setPos($positive)
    {
        $this->pos = $positive;
        return $this;
    }

    /**
     * Get pos
     *
     * @return boolean 
     */
    public function getPos()
    {
        return $this->pos;
    }
}