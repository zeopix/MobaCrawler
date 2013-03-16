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

}
 	