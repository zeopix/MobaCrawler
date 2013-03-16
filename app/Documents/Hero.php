<?php
namespace Documents;
// class name example: Doctrine\ODM\MongoDB\Mapping\Annotations\Id
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;


/** @Entity @Table(name="hero") */
class Hero
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
	
	/** @Column(type="string") **/
    public $name;

    /**
     * @OneToMany(targetEntity="Build", mappedBy="hero")
     */
     public $builds;

    /** @Column(type="float",nullable=true) **/
    public $health;

    /** @Column(type="float",nullable=true) **/
    public $mana;

    /** @Column(type="float",nullable=true) **/
    public $speed;

    /** @Column(type="float",nullable=true) **/
    public $armor;

    /** @Column(type="float",nullable=true) **/
    public $resist;

    /** @Column(type="float",nullable=true) **/
    public $critical;

    /** @Column(type="float",nullable=true) **/
    public $health_regen;

    /** @Column(type="float",nullable=true) **/
    public $mana_regen;

    /** @Column(type="float",nullable=true) **/
    public $range;


    /** @Column(type="string",nullable=true) **/
    public $image;

    /** @Column(type="string",nullable=true) **/
    public $tags;

	/** @Column(type="integer",nullable=true) **/
    public $riot_points;

	/** @Column(type="integer",nullable=true) **/
    public $influence_points;

    /**
     * @OneToMany(targetEntity="Ability", mappedBy="hero")
     */
     public $abilities;

	/** @Column(type="datetime") **/
    public $updated_at;

     /** @Column(type="string") **/
    public $link;

     /** @Column(type="boolean") **/
    public $crawled = false;


	public function setInfo($info){
		$this->info = $info;
		return $this;
	}
	public function getInfo($info){
		return $this->info;
	}

	public function setRiotPoints($riot_points){
		$this->riot_points = $riot_points;
		return $this;
	}
	public function getRiotPoints($riot_points){
		return $this->riot_points;
	}

	public function setInfluencePoints($influence_points){
		$this->influence_points = $influence_points;
		return $this;
	}
	public function getInfluencePoints($influence_points){
		return $this->influence_points;
	}

	public function setTags($tags){
		$this->tags = $tags;
		return $this;
	}
	public function getTags($tags){
		return $this->tags;
	}


	public function setImage($image){
		$this->image = $image;
		return $this;
	}
	public function getImage($image){
		return $this->image;
	}

	public function setCrawled($crawled){
		$this->crawled = $crawled;
		return $this;
	}
	public function getCrawled($crawled){
		return $this->crawled;
	}

	public function setLink($link){
		$this->link = $link;
		return $this;
	}
	public function getLink($link){
		return $this->link;
	}

	public function setName($name){
		$this->name = $name;
		return $this;
	}
	public function getName($name){
		return $this->name;
	}


	public function setUpdatedAt($updated_at){
		$this->updated_at = $updated_at;
		return $this;
	}
	public function getUpdatedAt($updated_at){
		return $this->updated_at;
	}

    public function __construct() {
        $this->builds = new \Doctrine\Common\Collections\ArrayCollection();
    }

	public function addBuild($build){
		$this->builds[] = $build;
		return $this;
	}
	public function getBuilds($builds){
		return $this->builds;
	}

 /**
     * Set health
     *
     * @param float $health
     * @return Hero
     */
    public function setHealth($health)
    {
        $this->health = $health;

        return $this;
    }

    /**
     * Get health
     *
     * @return float 
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * Set mana
     *
     * @param float $mana
     * @return Hero
     */
    public function setMana($mana)
    {
        $this->mana = $mana;

        return $this;
    }

    /**
     * Get mana
     *
     * @return float 
     */
    public function getMana()
    {
        return $this->mana;
    }

    /**
     * Set speed
     *
     * @param float $speed
     * @return Hero
     */
    public function setSpeed($speed)
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * Get speed
     *
     * @return float 
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set armor
     *
     * @param float $armor
     * @return Hero
     */
    public function setArmor($armor)
    {
        $this->armor = $armor;

        return $this;
    }

    /**
     * Get armor
     *
     * @return float 
     */
    public function getArmor()
    {
        return $this->armor;
    }

    /**
     * Set resist
     *
     * @param float $resist
     * @return Hero
     */
    public function setResist($resist)
    {
        $this->resist = $resist;

        return $this;
    }

    /**
     * Get resist
     *
     * @return float 
     */
    public function getResist()
    {
        return $this->resist;
    }

    /**
     * Set critical
     *
     * @param float $critical
     * @return Hero
     */
    public function setCritical($critical)
    {
        $this->critical = $critical;

        return $this;
    }

    /**
     * Get critical
     *
     * @return float 
     */
    public function getCritical()
    {
        return $this->critical;
    }

    /**
     * Set health_regen
     *
     * @param float $healthRegen
     * @return Hero
     */
    public function setHealthRegen($healthRegen)
    {
        $this->health_regen = $healthRegen;

        return $this;
    }

    /**
     * Get health_regen
     *
     * @return float 
     */
    public function getHealthRegen()
    {
        return $this->health_regen;
    }

    /**
     * Set mana_regen
     *
     * @param float $manaRegen
     * @return Hero
     */
    public function setManaRegen($manaRegen)
    {
        $this->mana_regen = $manaRegen;

        return $this;
    }

    /**
     * Get mana_regen
     *
     * @return float 
     */
    public function getManaRegen()
    {
        return $this->mana_regen;
    }

    /**
     * Set range
     *
     * @param float $range
     * @return Hero
     */
    public function setRange($range)
    {
        $this->range = $range;

        return $this;
    }

    /**
     * Get range
     *
     * @return float 
     */
    public function getRange()
    {
        return $this->range;
    }
    

}
 	