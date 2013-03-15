<?php

namespace Database\CrawlerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rune
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Rune
{
    //RELATIONS

    /**
     * @ManyToMany(targetEntity="BlockRunes")
     * @JoinTable(name="Objects_Blocks",
     *      joinColumns={@JoinColumn(name="rune_id", referencedColumnName="id")},
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
     * @var integer
     *
     * @ORM\Column(name="purchase_cost", type="integer")
     */
    private $purchaseCost;

    /**
     * @var integer
     *
     * @ORM\Column(name="purchase_cost_riot", type="integer")
     */
    private $purchaseCostRiot;

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
     * @return Rune
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
     * Set purchaseCost
     *
     * @param integer $purchaseCost
     * @return Rune
     */
    public function setPurchaseCost($purchaseCost)
    {
        $this->purchaseCost = $purchaseCost;
    
        return $this;
    }

    /**
     * Get purchaseCost
     *
     * @return integer 
     */
    public function getPurchaseCost()
    {
        return $this->purchaseCost;
    }

    /**
     * Set purchaseCostRiot
     *
     * @param integer $purchaseCostRiot
     * @return Rune
     */
    public function setPurchaseCostRiot($purchaseCostRiot)
    {
        $this->purchaseCostRiot = $purchaseCostRiot;
    
        return $this;
    }

    /**
     * Get purchaseCostRiot
     *
     * @return integer 
     */
    public function getPurchaseCostRiot()
    {
        return $this->purchaseCostRiot;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Rune
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
     * @return Rune
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
