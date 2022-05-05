<?php

$b= new mysqli('localhost','root','','FlyTrip');
if(mysqli_connect_errno()){
	exit('Connect failed: '.mysqli_connect_error());
	}
	
	$sql="CREATE TABLE `utilizatori` (
	`Email` VARCHAR(100) NOT NULL PRIMARY KEY,
	`Parola` VARCHAR(10) NOT NULL,
	`Nume` VARCHAR(50) NOT NULL
	) ";
	if($b->query($sql)===TRUE)
		echo "Tabelul 'utilizatori' a fost creat cu succes <br/>";
	else 
		echo "Eroare".$b->error;
	
	$sql="CREATE TABLE `postare` (
	`Locatie` VARCHAR(100) NOT NULL,
	`Email` VARCHAR(100) NOT NULL,
	`Tip` VARCHAR(20) NOT NULL,
	`Descriere` VARCHAR(100) ,
	`Numar` INT(4) PRIMARY KEY,
	`Imagine1` LONGBLOB NOT NULL,
    `Imagine2` LONGBLOB NOT NULL,
    `Imagine3` LONGBLOB NOT NULL,
	`Data` DATETIME NOT NULL
	) ";
	if($b->query($sql)===TRUE)
		echo "Tabelul 'postare' a fost creat cu succes <br/>";
	else 
		echo "Eroare".$b->error;
    

	$sql="CREATE TABLE `Comentarii` (
		`ID` INT(4) PRIMARY KEY,
		`Comentariu` VARCHAR(100) NOT NULL,
		`IDPostare` VARCHAR(100) NOT NULL,
		`Utilizator` VARCHAR(100) NOT NULL
		) ";
		if($b->query($sql)===TRUE)
			echo "Tabelul 'comentarii' a fost creat cu succes <br/>";
		else 
			echo "Eroare".$b->error;

	$sql="CREATE TABLE `Cereri` (
		`Utilizator` VARCHAR(100) NOT NULL,
		`Destinatar` VARCHAR(100) NOT NULL
		) ";
		if($b->query($sql)===TRUE)
			echo "Tabelul 'Cereri' a fost creat cu succes <br/>";
		else 
			echo "Eroare".$b->error;

	$sql="CREATE TABLE `Prieteni` (
		`Persoana1` VARCHAR(100) NOT NULL,
		`Persoana2` VARCHAR(100) NOT NULL
		) ";
		if($b->query($sql)===TRUE)
			echo "Tabelul 'Prieteni' a fost creat cu succes <br/>";
		else 
			echo "Eroare".$b->error;
	$sql="CREATE TABLE `Administrator` (
		`Nume` VARCHAR(100) NOT NULL PRIMARY KEY,
		`Parola` VARCHAR(100) NOT NULL
		) ";
		if($b->query($sql)===TRUE)
			echo "Tabelul 'Administrator' a fost creat cu succes <br/>";
		else 
			echo "Eroare".$b->error;	

	$sql="CREATE TABLE `Apreciere` (
		`Postare` INT(4) NOT NULL ,
		`Persoana` VARCHAR(100) NOT NULL
		) ";
		if($b->query($sql)===TRUE)
			echo "Tabelul 'Apreciere' a fost creat cu succes <br/>";
		else 
			echo "Eroare".$b->error;
	$sql="CREATE TABLE `Recomandari` (
		`Locatie` VARCHAR(100) NOT NULL,
		`Administrator` VARCHAR(100) NOT NULL,
		`Descriere` VARCHAR(200) ,
		`Numar` INT(4) PRIMARY KEY,
		`Imagine1` LONGBLOB NOT NULL,
		`Imagine2` LONGBLOB NOT NULL,
		`Imagine3` LONGBLOB NOT NULL,
		`Data` DATETIME NOT NULL
		) ";
		if($b->query($sql)===TRUE)
			echo "Tabelul 'Recomandari' a fost creat cu succes <br/>";
		else 
			echo "Eroare".$b->error;

	$sql="CREATE TABLE `RecomandariPrieteni` (
		`Utilizator1` VARCHAR(100) NOT NULL,
		`Utilizator2` VARCHAR(100) NOT NULL,
		`Postare` INT(4) NOT NULL
		) ";
		if($b->query($sql)===TRUE)
		echo "Tabelul 'RecomandariPrieteni' a fost creat cu succes <br/>";
			else 
		echo "Eroare".$b->error;
	$b->close();

?>