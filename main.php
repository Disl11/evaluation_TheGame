<?php

require_once "GameEngine.php";
require_once "Personnage.php";
require_once "Humain.php";
require_once "Orc.php";
require_once "Elfe.php";



$game = new GameEngine();



$elfe1 = new Elfe("chloe");
$humain1 = new Humain("Pierre");
$orc1 = new Orc("Nicolas");
$orc2 = new Orc("Jean-claude");

$game->addCombattant($elfe1, $humain1, $orc1, $orc2);
$game->start();



//======== Test affichage des different personnage ========
// $humain1 = new Humain("Elodie");
// $humain2 = new Humain("Jordan");

// echo $humain1->attaquer($humain2);

// $orc1 = new Humain("valentin");
// $orc2 = new Humain("pierre");

// echo $orc1->attaquer($orc2);

// $Elfe1 = new Elfe("Nico");
// $Elfe2 = new Elfe("damien");

// echo $Elfe1->attaquer($humain1);
