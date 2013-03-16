<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/config.php';
require_once __DIR__.'/util.php';
require_once __DIR__.'/Documents/Link.php';

use Goutte\Client;
use Documents\Link;


$count = $dm->createQueryBuilder('Documents\Link')
			->field('status')->equals(1)
			->field('level')->equals(3)
             ->getQuery()->execute()->count();

echo $count;
die();

?>
