<?php



use Doctrine\ORM\Mapping as ORM;
use application\models\entities\repositories as Repo;


/**
 * Sitemap
 *
 * @ORM\Table(name="sitemap")
 * @ORM\Entity(repositoryClass="Repo\BuyRepository")
 */
class Sitemap
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
     * @var string $titel
     *
     * @ORM\Column(name="titel", type="string", length=255, nullable=true)
     */
    private $titel;

    /**
     * @var string $language
     *
     * @ORM\Column(name="language", type="string", length=2, nullable=true)
     */
    private $language;

    /**
     * @var string $keyword
     *
     * @ORM\Column(name="keyword", type="string", length=255, nullable=true)
     */
    private $keyword;

    /**
     * @var string $descr
     *
     * @ORM\Column(name="descr", type="string", length=255, nullable=true)
     */
    private $descr;

    /**
     * @var string $robots
     *
     * @ORM\Column(name="robots", type="string", length=20, nullable=true)
     */
    private $robots;

    /**
     * @var string $directory
     *
     * @ORM\Column(name="directory", type="string", length=100, nullable=true)
     */
    private $directory;

    /**
     * @var string $filename
     *
     * @ORM\Column(name="filename", type="string", length=50, nullable=true)
     */
    private $filename;

    /**
     * @var string $typ
     *
     * @ORM\Column(name="typ", type="string", length=4, nullable=true)
     */
    private $typ;

    /**
     * @var string $path
     *
     * @ORM\Column(name="path", type="string", length=200, nullable=true)
     */
    private $path;

    /**
     * @var boolean $lp
     *
     * @ORM\Column(name="lp", type="boolean", nullable=true)
     */
    private $landingPage;

    /**
     * @var boolean $om
     *
     * @ORM\Column(name="om", type="boolean", nullable=true)
     */
    private $onlyMember;

    /**
     * @var boolean $payed
     *
     * @ORM\Column(name="payed", type="boolean", nullable=true)
     */
    private $onlyPayedMember;


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
     * Set titel
     *
     * @param string $titel
     * @return Sitemap
     */
    public function setTitel($titel)
    {
        $this->titel = $titel;
        return $this;
    }

    /**
     * Get titel
     *
     * @return string 
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Sitemap
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set keyword
     *
     * @param string $keyword
     * @return Sitemap
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
        return $this;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set desc
     *
     * @param string $desc
     * @return Sitemap
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
        return $this;
    }

    /**
     * Get desc
     *
     * @return string 
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set robots
     *
     * @param string $robots
     * @return Sitemap
     */
    public function setRobots($robots)
    {
        $this->robots = $robots;
        return $this;
    }

    /**
     * Get robots
     *
     * @return string 
     */
    public function getRobots()
    {
        return $this->robots;
    }

    /**
     * Set directory
     *
     * @param string $directory
     * @return Sitemap
     */
    public function setDirectory($directory)
    {
        $this->directory = $directory;
        return $this;
    }

    /**
     * Get directory
     *
     * @return string 
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Sitemap
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
     * Set typ
     *
     * @param string $typ
     * @return Sitemap
     */
    public function setTyp($typ)
    {
        $this->typ = $typ;
        return $this;
    }

    /**
     * Get typ
     *
     * @return string 
     */
    public function getTyp()
    {
        return $this->typ;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Sitemap
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set landingPage
     *
     * @param boolean $landingPage
     * @return Sitemap
     */
    public function setLandingPage($landingPage)
    {
        $this->lp = $landingPage;
        return $this;
    }

    /**
     * Get lp
     *
     * @return boolean 
     */
    public function getLandingPage()
    {
        return $this->lp;
    }

    /**
     * Set onlyMember
     *
     * @param boolean $onlyMember
     * @return Sitemap
     */
    public function setOnlyMember($onlyMember)
    {
        $this->om = $onlyMember;
        return $this;
    }

    /**
     * Get om
     *
     * @return boolean 
     */
    public function getOnlyMember()
    {
        return $this->om;
    }

    /**
     * Set onlyPayedMember
     *
     * @param boolean $onlyPayedMember
     * @return Sitemap
     */
    public function setOnlyPayedMember($onlyPayedMember)
    {
        $this->payed = $onlyPayedMember;
        return $this;
    }

    /**
     * Get payed
     *
     * @return boolean 
     */
    public function getOnlyPayedMember()
    {
        return $this->payed;
    }
}