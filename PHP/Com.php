<?php
    $coment=$_POST["coment"];
	$id=$_POST["id"];
	$untilizator="faranume";

	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com="SELECT * FROM `postare`";
		$info=$b->query($com);


   
    $adauga="Insert into `comentarii` values ('".$coment."','".$id."','".$untilizator."')";
	 	if(mysqli_query($b,$adauga))
			echo "Comentariu a fost adăugată";
	 	else
	 		echo "Procesul eşuat". mysqli_errno($b). " : ". mysqli_error($b);
    
    
$b->close();
?>