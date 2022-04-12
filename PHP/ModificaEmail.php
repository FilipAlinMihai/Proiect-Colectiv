<?php
    session_start();
	$emailnou=$_POST["emailnou"];
	$email=$_POST["email"];
	$parola=$_POST["parola"];
	
	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	
	if($parola==$_SESSION['parola'] && $email==$_SESSION['email'])
		{
			$masina="Update `utilizatori` set Email='".$emailnou."' where Email='".$_SESSION['email']."'";
            
			if(mysqli_query($b,$masina)){
                $_SESSION['email']=$emailnou;
				echo "Datele au fost modificate";
            }
			else
				echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
		}
		else
		{
			echo("Date incorecte");
		}
$b->close();
?>