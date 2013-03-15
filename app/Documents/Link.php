<?php
namespace Documents;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
// class name example: Doctrine\ODM\MongoDB\Mapping\Annotations\Id
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/** @Entity @Table(name="links") */
class Link
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    public $id;

    /** @Column(type="string") **/
    public $href;

    /** @Column(type="string") **/
    public $text;

    /** @Column(type="integer") **/
    public $level = 1;

    /** @Column(type="integer") **/
    public $status = 1;

    public function __construct($text,$link)
    {
        $this->href = $link;
        $this->text = $text;
    }


    public function setText($text){
        $this->text = $text;
        return $this;
    }
    public function getText($text){
        return $this->text;
    }


    public function setHref($href){
        $this->href = $href;
        return $this;
    }
    public function getHref($href){
        return $this->href;
    }


    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
    public function getStatus($status){
        return $this->status;
    }



    public function setLevel($level){
        $this->level = $level;
        return $this;
    }
    public function getLevel($level){
        return $this->level;
    }    

}