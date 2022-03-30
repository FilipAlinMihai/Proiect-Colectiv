<?php
	session_start();
	//$_SESSION['numeutilizator']=$_POST["numeutilizator"];
	$_SESSION['parola']=$_POST["parola"];
	$_SESSION['email']=$_POST["email"];
	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com="SELECT * FROM `utilizatori`";

	$info=$b->query($com);
	if($info->num_rows > 0)
	{
		$a=0;
		while($row=$info->fetch_assoc())
		{
			if($row['Email']==$_SESSION['email'] && $row['Parola']==$_SESSION['parola'])
				$a=1;
		}
		if($a==1)
		{
			header("Location: ../paginaP.html");
		}
		else
		{
			echo "Utilizatorul nu a fost găsit";
		}
	}
	else
	{
		echo "Utilizatorul nu a fost găsit";
	}
	$b->close();
?>