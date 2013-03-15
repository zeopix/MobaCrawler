<?php
namespace Documents;
// class name example: Doctrine\ODM\MongoDB\Mapping\Annotations\Id
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;


/** @Entity @Table(name="build") */
class Build
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;

    /** @Column(type="string",nullable=true) **/
    public $title;

    /**
     * @ManyToOne(targetEntity="Hero", inversedBy="builds")
     * @JoinColumn(name="hero_id", referencedColumnName="id")
     **/
    public $hero;

    /** @Column(type="array",nullable=true) **/
    public $runes;

    /** @Column(type="array",nullable=true) **/
    public $bags;

    /** @Column(type="array",nullable=true) **/
    public $spells;

    /** @Column(type="array",nullable=true) **/
    public $abilities;

    /** @Column(type="array",nullable=true) **/
    public $mastery;

    /** @Column(type="array",nullable=true) **/
    public $stats;


    /** @Column(type="integer") **/
    public $status = 1;


    /** @Column(type="boolean") **/
    public $crawled = false;


    /** @Column(type="datetime") **/
    public $crawled_at;

    /** @Column(type="string",nullable=true) **/
    public $link;

    public function setLink($link){
        $this->link = $link;
        return $this;
    }
    public function getLink($link){
        return $this->link;
    }

    public function __construct($text,$link)
    {
        $this->href = $link;
        $this->text = $text;
    }


    public function setCrawledAt($crawled_at){
        $this->crawled_at = $crawled_at;
        return $this;
    }
    public function getCrawledAt($crawled_at){
        return $this->crawled_at;
    }


    public function setSpells($spells){
        $this->spells = $spells;
        return $this;
    }
    public function getSpells($spells){
        return $this->spells;
    }


    public function setHero($hero){
        $this->hero = $hero;
        return $this;
    }
    public function getHero($hero){
        return $this->hero;
    }


    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
    public function getStatus($status){
        return $this->status;
    }

    public function setTitle($title){
        $this->title = $title;
        return $this;
    }
    public function getTitle($title){
        return $this->title;
    }


    public function setRunes($runes){
        $this->runes = $runes;
        return $this;
    }
    public function getRunes($runes){
        return $this->runes;
    }

    public function setCrawled($crawled){
        $this->crawled = $crawled;
        return $this;
    }
    public function getCrawled($crawled){
        return $this->crawled;
    }


    public function setMastery($mastery){
        $this->mastery = $mastery;
        return $this;
    }
    public function getMastery($mastery){
        return $this->mastery;
    }


    public function setAbilities($abilities){
        $this->abilities = $abilities;
        return $this;
    }
    public function getAbilities($abilities){
        return $this->abilities;
    }


    public function setStats($stats){
        $this->stats = $stats;
        return $this;
    }
    public function getStats($stats){
        return $this->stats;
    }


    public function setBags($bags){
        $this->bags = $bags;
        return $this;
    }
    public function getBags($bags){
        return $this->bags;
    }







  

}