<?php

namespace Database\CrawlerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlockRunes
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class BlockRunes
{
    //RELATIONS

     /**
     * @ORM\ManyToOne(targetEntity="Hero", inversedBy="runes")
     * @ORM\JoinColumn(name="hero_id", referencedColumnName="id")
     */
    protected $hero;


    /** @ManyToMany(targetEntity="Rune") */
    private $runes;
    

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
     * @return BlockRunes
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
}
