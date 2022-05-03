<?php
    session_start();
    $id=$_POST["id"];
    $idp=$_POST["idp"];
	$tip=$_POST["tip"];
	$b = new mysqli('localhost', 'root', '', 'FlyTrip');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "DELETE FROM `comentarii` WHERE ID=".$id; 
	

	if(mysqli_query($b,$com)){
                     $_SESSION['Comentariu']=$idp;
					 $_SESSION['tip']=$tip;
					 if($tip=='5')
					 	header("Location: AfisareCom1A.php");
					 else
					 	header("Location: AfisareCom1.php");
                    }
				 else
					 echo "Datele nu au putut fi sterse ". mysqli_errno($b). " : ". mysqli_error($b);
	
	$b->close();


?>