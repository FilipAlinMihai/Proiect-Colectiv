<?php
    session_start();
	$p1=$_POST["persoana1"];
	
	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	
		$a="DELETE FROM cereri WHERE destinatar='".$_SESSION['email']."' AND utilizator='".$p1."'";
        
		if(mysqli_query($b,$a)){
			echo "Datele au fost sterse din cereri</br>";
        }
		else
			echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
		
        $a="INSERT INTO prieteni VALUES ('".$p1."','".$_SESSION['email']."')";
        
        if(mysqli_query($b,$a)){
             echo "Datele au fost adaugate in prieteni";
        }
        else
          echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
$b->close();
?>