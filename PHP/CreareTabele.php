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
	`Numar` INT(2) PRIMARY KEY,
	`Imagine1` LONGBLOB NOT NULL,
    `Imagine2` LONGBLOB NOT NULL,
    `Imagine3` LONGBLOB NOT NULL
	) ";
	if($b->query($sql)===TRUE)
		echo "Tabelul 'postare' a fost creat cu succes <br/>";
	else 
		echo "Eroare".$b->error;
    

	$sql="CREATE TABLE `Comentarii` (
		`Comentariu` VARCHAR(100) NOT NULL,
		`IDPostare` VARCHAR(100) NOT NULL,
		`Utilizator` VARCHAR(20) NOT NULL
		) ";
		if($b->query($sql)===TRUE)
			echo "Tabelul 'comentarii' a fost creat cu succes <br/>";
		else 
			echo "Eroare".$b->error;
	$b->close();

?>