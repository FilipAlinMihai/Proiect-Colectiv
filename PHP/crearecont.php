<?php
	session_start();
	$_SESSION['numeutilizator']=$_POST["numeutilizator"];
	$_SESSION['parola']=$_POST["parola1"];
	$parola2=$_POST["parola2"];
	$email=$_POST["email"];
	
	$pattern='/[a-zA-Z0-9._,+-]+@[a-zA-Z0-9._,+-]+\.[a-zA-Z]{2,6}/';
	
	if(preg_match($pattern, $email)) {
	
	if(strlen($_SESSION['numeutilizator'])<5 || strlen($_SESSION['numeutilizator'])>25)
		echo "Nume de utilizator de dimensiuni nepotrivite (între 5 şi 25 de caractere)";
	else{
	if(strlen($parola2)>9 || strlen($parola2)<5)
	{
		echo "Paroal are dimensiuni nepotrivite";
	}
	else
	{
	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	
	if($_SESSION['parola']!=$parola2)
		echo 'Parola1 tebuie sa fie egala cu Parola2';
	else 
	{
	
	$com="SELECT * FROM `utilizatori`";
	$bc=0;
	$info=$b->query($com);
	if($info->num_rows > 0)
	{
		$a=0;
		$bc=0;
		while($row=$info->fetch_assoc())
		{
			if($row['Nume']==$_SESSION['numeutilizator'])
				$a=1;
			if($row['Email']==$email)
				$bc=1;
		}
		if($a==1)
			echo 'Numele de utilizator este luat';
		if($bc==1)
			echo 'Adresa de email este deja utilizată';
		
	}
		if($a==0 && $bc==0)
		{
			if(strlen($email)<5)
				echo 'Adresa de email este invalidă';
			else
			{
				$utilizator="Insert into `utilizatori` (Email,Parola,Nume) values ('".$email."','".$_SESSION['parola']."','".$_SESSION['numeutilizator']."')"; 
				if(mysqli_query($b,$utilizator))
					 header("Location: ../paginaP.html");
				 else
					 echo "Datele nu au putut fi adăugate ". mysqli_errno($b). " : ". mysqli_error($b);
			}
		}
	
	}
	$b->close();
	}
	}
	}
	else
		echo "Adresa de email nu este corecta";
	
?>