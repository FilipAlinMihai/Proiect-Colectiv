<?php
    $id=$_POST["ids"];
	$b = new mysqli('localhost', 'root', '', 'FlyTrip');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "DELETE FROM `postare` WHERE Numar=".$id; 
	$com1= "DELETE FROM `apreciere` WHERE Postare=".$id;
	$com2= "DELETE FROM `comentarii` WHERE IDPostare=".$id;
	$com3= "DELETE FROM `recomandariprieteni` WHERE Postare=".$id;

	if(mysqli_query($b,$com))
		echo 'Datele au fost sterse! ';
	else
		echo "Datele nu au putut fi sterse ". mysqli_errno($b). " : ". mysqli_error($b);
	if(mysqli_query($b,$com1))
		echo 'Datele au fost sterse! ';
	else
		echo "Datele nu au putut fi sterse ". mysqli_errno($b). " : ". mysqli_error($b);
	if(mysqli_query($b,$com2))
		echo 'Datele au fost sterse! ';
	else
		echo "Datele nu au putut fi sterse ". mysqli_errno($b). " : ". mysqli_error($b);
	if(mysqli_query($b,$com3))
		echo 'Datele au fost sterse! ';
	else
		echo "Datele nu au putut fi sterse ". mysqli_errno($b). " : ". mysqli_error($b);
	$b->close();


?>