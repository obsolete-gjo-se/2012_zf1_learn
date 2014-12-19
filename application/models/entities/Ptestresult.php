<?php



use Doctrine\ORM\Mapping as ORM;
use application\models\entities\repositories as Repo;

/**
 * Ptestresult
 *
 * @ORM\Table(name="ptestresult")
 * @ORM\Entity(repositoryClass="Repo\PtestresultRepository")
 */
class Ptestresult
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
     * @var boolean $answer
     *
     * @ORM\Column(name="answer", type="smallint", nullable=false)
     */
    private $answer;

    /**
     * @var Ptestdate
     *
     * @ORM\OneToOne(targetEntity="Ptestdate")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ptestdate_id", referencedColumnName="id", unique=true, nullable=false)
     * })
     */
    private $ptestdate;

    /**
     * @var Quest
     *
     * @ORM\OneToOne(targetEntity="Quest")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="quest_id", referencedColumnName="id", unique=true, nullable=false)
     * })
     */
    private $quest;


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
     * Set answer
     *
     * @param boolean $answer
     * @return Ptestresult
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this;
    }

    /**
     * Get answer
     *
     * @return boolean 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set ptestdate
     *
     * @param Ptestdate $ptestdate
     * @return Ptestresult
     */
    public function setPtestdate(\Ptestdate $ptestdate = null)
    {
        $this->ptestdate = $ptestdate;
        return $this;
    }

    /**
     * Get ptestdate
     *
     * @return Ptestdate 
     */
    public function getPtestdate()
    {
        return $this->ptestdate;
    }

    /**
     * Set quest
     *
     * @param Quest $quest
     * @return Ptestresult
     */
    public function setQuest(\Quest $quest = null)
    {
        $this->quest = $quest;
        return $this;
    }

    /**
     * Get quest
     *
     * @return Quest 
     */
    public function getQuest()
    {
        return $this->quest;
    }
}