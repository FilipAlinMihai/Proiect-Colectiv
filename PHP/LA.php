<?php

	$nume=$_POST["numeuADM"];
	$parola=$_POST["parolaA"];
	session_start();

		$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
		if (mysqli_connect_errno()) {
			exit('Connect failed: '. mysqli_connect_error());
		}
		$com="SELECT * FROM `administrator`";
	
		$info=$b->query($com);
		if($info->num_rows > 0)
		{
			$a=0;
			while($row=$info->fetch_assoc())
			{
				if($row['Nume']==$nume && $row['Parola']==$parola)
					$a=1;
			}
			if($a==1)
			{
				$_SESSION['Admin']=$nume;
				header("Location: ../PA.html");
			}
			else
			{
				echo "Pagina aceasta este dedicată administratorilor";
			}
		}
		else
		{
			echo "Pagina aceasta este dedicată administratorilor";
		}
		$b->close();
?>