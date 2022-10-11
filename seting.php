<?php

include "db.php"; // include de la connection a la base de données

$cities = $db->prepare('SELECT * FROM ville');
$cities->execute();

$jour = $cities->fetchAll(PDO::FETCH_OBJ);
////////////////////////////////////////////////
$accidents = $db->prepare('SELECT * FROM typeaccidents');
$accidents->execute();

$acci = $accidents->fetchAll(PDO::FETCH_OBJ);
//////////////////////////////////////////////////
$vols = $db->prepare('SELECT * FROM typevols');
$vols->execute();

$acc = $vols->fetchAll(PDO::FETCH_OBJ);
///////////////////////////////////////////////////
$meurtre = $db->prepare('SELECT * FROM typemeurtres');
$meurtre->execute();

$ac = $meurtre->fetchAll(PDO::FETCH_OBJ);
//////////////////////////////////////////////////
$suicide = $db->prepare('SELECT * FROM typesuicides');
$suicide->execute();

$a = $suicide->fetchAll(PDO::FETCH_OBJ);
//////////////////////////////////////////
$incendie = $db->prepare('SELECT * FROM typeincendies');
$incendie->execute();

$accid = $incendie->fetchAll(PDO::FETCH_OBJ);
///////////////////////////////////////////
$viols = $db->prepare('SELECT * FROM typeviols');
$viols->execute();

$accidd = $viols->fetchAll(PDO::FETCH_OBJ);
///////////////////////////////////////////
$negligence = $db->prepare('SELECT * FROM typenegligences');
$negligence->execute();

$accidde = $negligence->fetchAll(PDO::FETCH_OBJ);