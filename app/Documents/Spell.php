<?php
namespace Documents;
// class name example: Doctrine\ODM\MongoDB\Mapping\Annotations\Id
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;


/** @Entity @Table(name="spell") */
class Spell
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
	
	/** @Column(type="string",nullable=true) **/
    public $name;
	
	/** @Column(type="integer",nullable=true) **/
    public $level;
	
	/** @Column(type="string",nullable=true) **/
    public $description;
	
	/** @Column(type="datetime",nullable=true) **/
    public $updated_at;
	
	/** @Column(type="string",nullable=true) **/
    public $image;
	
	/** @Column(type="string") **/
    public $link;
	
	/** @Column(type="boolean") **/
    public $crawled = false;

	public function setImage($image){
		$this->image = $image;
		return $this;
	}
	public function getImage($image){
		return $this->image;
	}

	public function setLevel($level){
		$this->level = $level;
		return $this;
	}
	public function getLevel($level){
		return $this->level;
	}

	public function setDescription($description){
		$this->description = $description;
		return $this;
	}
	public function getDescription($description){
		return $this->description;
	}

	public function setUpdatedAt($updated_at){
		$this->updated_at = $updated_at;
		return $this;
	}
	public function getUpdatedAt($updated_at){
		return $this->updated_at;
	}

    public function getId(){
    	return $this->id;
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

}
 	