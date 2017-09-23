<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// Init Doctrine
require_once "autoload.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "../home/model/ProductEntity.php";
require_once "../home/model/TrackingUserEntity.php";
require_once "../home/model/UserEntity.php";

$paths = array("/path/to/entity-files");
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'nanapet_db'
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
global $entityManager;
$entityManager = EntityManager::create($dbParams, $config);

//$trackingUser = new TrackingUser();
//$trackingUser = $entityManager->find('TrackingUser', 1);
//$trackingUser->setIp_address('192.168.0.1');
//$trackingUser->setUser(2001);
//$entityManager->persist($trackingUser);
//$entityManager->flush();

//$trackingUserDemo = $entityManager->getRepository('TrackingUser')->findOneBy(array('ip_address'=>33333));
//DQL
$query = $entityManager->createQuery("SELECT track_user, user "
                                . " FROM TrackingUser track_user JOIN track_user.user user "
                                . " WHERE user.name LIKE '%luyen%'");
//$query = $entityManager->createQuery('SELECT track_user FROM TrackingUser track_user');
$result = $query->getResult();
$demo = $result[0]->getUser()->getName();
$trackingUser = new TrackingUser();