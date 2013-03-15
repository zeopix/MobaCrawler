<?php

namespace Database\CrawlerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hero
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Hero
{
    //RELATIONS

     /**
     * @ORM\OneToMany(targetEntity="BlockRunes", mappedBy="hero")
     */
    protected $runes;

     /**
     * @ORM\OneToMany(targetEntity="BlockObjects", mappedBy="hero")
     */
    protected $objects;



    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="mobafireId", type="string", length=255)
     */
    private $mobafireId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="hero_base", type="string", length=255)
     */
    private $heroBase;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var array
     *
     * @ORM\Column(name="skills", type="array")
     */
    private $skills;


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
     * @return Hero
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
     * Set mobafireId
     *
     * @param string $mobafireId
     * @return Hero
     */
    public function setMobafireId($mobafireId)
    {
        $this->mobafireId = $mobafireId;
    
        return $this;
    }

    /**
     * Get mobafireId
     *
     * @return string 
     */
    public function getMobafireId()
    {
        return $this->mobafireId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Hero
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set heroBase
     *
     * @param string $heroBase
     * @return Hero
     */
    public function setHeroBase($heroBase)
    {
        $this->heroBase = $heroBase;
    
        return $this;
    }

    /**
     * Get heroBase
     *
     * @return string 
     */
    public function getHeroBase()
    {
        return $this->heroBase;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Hero
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set skills
     *
     * @param array $skills
     * @return Hero
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;
    
        return $this;
    }

    /**
     * Get skills
     *
     * @return array 
     */
    public function getSkills()
    {
        return $this->skills;
    }
}
