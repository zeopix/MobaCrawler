<?php

namespace Database\CrawlerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Object
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Object
{
    //RELATIONS

    /**
     * @ManyToMany(targetEntity="BlockObjects")
     * @JoinTable(name="Objects_Blocks",
     *      joinColumns={@JoinColumn(name="object_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="block_id", referencedColumnName="id")}
     *      )
     */
    private $blocks;


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
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="mobafireId", type="string", length=255)
     */
    private $mobafireId;

    /**
     * @var string
     *
     * @ORM\Column(name="cost", type="string", length=255)
     */
    private $cost;

    /**
     * @var string
     *
     * @ORM\Column(name="return_cost", type="string", length=255)
     */
    private $returnCost;

    /**
     * @var string
     *
     * @ORM\Column(name="descrition", type="string", length=255)
     */
    private $descrition;

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
     * @return Object
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
     * Set image
     *
     * @param string $image
     * @return Object
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
     * Set mobafireId
     *
     * @param string $mobafireId
     * @return Object
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
     * Set cost
     *
     * @param string $cost
     * @return Object
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    
        return $this;
    }

    /**
     * Get cost
     *
     * @return string 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set returnCost
     *
     * @param string $returnCost
     * @return Object
     */
    public function setReturnCost($returnCost)
    {
        $this->returnCost = $returnCost;
    
        return $this;
    }

    /**
     * Get returnCost
     *
     * @return string 
     */
    public function getReturnCost()
    {
        return $this->returnCost;
    }

    /**
     * Set descrition
     *
     * @param string $descrition
     * @return Object
     */
    public function setDescrition($descrition)
    {
        $this->descrition = $descrition;
    
        return $this;
    }

    /**
     * Get descrition
     *
     * @return string 
     */
    public function getDescrition()
    {
        return $this->descrition;
    }

    /**
     * Set skills
     *
     * @param array $skills
     * @return Object
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
