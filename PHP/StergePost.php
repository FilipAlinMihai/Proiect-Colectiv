<?php
    $id=$_POST["ids"];
	$b = new mysqli('localhost', 'root', '', 'FlyTrip');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "DELETE FROM `postare` WHERE Numar=".$id; 
	

	if(mysqli_query($b,$com))
					 echo 'Datele au fost sterse!';
				 else
					 echo "Datele nu au putut fi sterse ". mysqli_errno($b). " : ". mysqli_error($b);
	
	$b->close();


?>