<?php

namespace Database\CrawlerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ability
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Ability
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var array
     *
     * @ORM\Column(name="def", type="array")
     */
    private $def;

    /**
     * @var array
     *
     * @ORM\Column(name="q", type="array")
     */
    private $q;

    /**
     * @var array
     *
     * @ORM\Column(name="w", type="array")
     */
    private $w;

    /**
     * @var array
     *
     * @ORM\Column(name="e", type="array")
     */
    private $e;

    /**
     * @var array
     *
     * @ORM\Column(name="r", type="array")
     */
    private $r;


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
     * Set def
     *
     * @param array $def
     * @return Ability
     */
    public function setDef($def)
    {
        $this->def = $def;
    
        return $this;
    }

    /**
     * Get def
     *
     * @return array 
     */
    public function getDef()
    {
        return $this->def;
    }

    /**
     * Set q
     *
     * @param array $q
     * @return Ability
     */
    public function setQ($q)
    {
        $this->q = $q;
    
        return $this;
    }

    /**
     * Get q
     *
     * @return array 
     */
    public function getQ()
    {
        return $this->q;
    }

    /**
     * Set w
     *
     * @param array $w
     * @return Ability
     */
    public function setW($w)
    {
        $this->w = $w;
    
        return $this;
    }

    /**
     * Get w
     *
     * @return array 
     */
    public function getW()
    {
        return $this->w;
    }

    /**
     * Set e
     *
     * @param array $e
     * @return Ability
     */
    public function setE($e)
    {
        $this->e = $e;
    
        return $this;
    }

    /**
     * Get e
     *
     * @return array 
     */
    public function getE()
    {
        return $this->e;
    }

    /**
     * Set r
     *
     * @param array $r
     * @return Ability
     */
    public function setR($r)
    {
        $this->r = $r;
    
        return $this;
    }

    /**
     * Get r
     *
     * @return array 
     */
    public function getR()
    {
        return $this->r;
    }
}
