<?php
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

AnnotationDriver::registerAnnotationClasses();

$config = new Configuration();
$config->setProxyDir(__DIR__.'/cache/proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__.'/cache/hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__.'/Document'));

$dm = DocumentManager::create(new Connection(), $config);
