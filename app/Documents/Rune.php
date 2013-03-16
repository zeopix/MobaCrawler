<?php
namespace Documents;
// class name example: Doctrine\ODM\MongoDB\Mapping\Annotations\Id
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;


/** @Entity @Table(name="rune") */
class Rune
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;
	
	/** @Column(type="string",nullable=true) **/
    public $name;
	
	/** @Column(type="string",nullable=true) **/
    public $image;
	
	/** @Column(type="integer",nullable=true) **/
    public $price;
	
	/** @Column(type="text",nullable=true) **/
    public $description;
	
	/** @Column(type="datetime") **/
    public $updated_at;
	
	/** @Column(type="string") **/
    public $link;
	
	/** @Column(type="boolean") **/
    public $crawled = false;


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

	public function setUpdatedAt($updated_at){
		$this->updated_at = $updated_at;
		return $this;
	}
	public function getUpdatedAt($updated_at){
		return $this->updated_at;
	}

	public function setDescription($description){
		$this->description = $description;
		return $this;
	}
	public function getDescription($description){
		return $this->description;
	}	

	public function setImage($image){
		$this->image = $image;
		return $this;
	}
	public function getImage($image){
		return $this->image;
	}

	public function setPrice($price){
		$this->price = $price;
		return $this;
	}
	public function getPrice($price){
		return $this->price;
	}

}
 	