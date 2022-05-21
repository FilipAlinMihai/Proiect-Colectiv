<?php
	session_start();
	
    $destinatar=$_POST['destinatar'];

	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	if($_SESSION['email']==$destinatar)
	{
		echo "Eroare de logica!";
	}
	else
	{
	$com="SELECT * FROM `cereri`";
	$bc=0;
	$a=0;
	$info=$b->query($com);
	if($info->num_rows > 0)
	{
		$a=0;
		$bc=0;
		while($row=$info->fetch_assoc())
		{
			if(($row['Utilizator']==$_SESSION['email'] && $row['Destinatar']==$destinatar) || ($row['Destinatar']==$_SESSION['email'] && $row['Utilizator']==$destinatar))
				$a=1;
		}
		if($a==1)
			echo 'Exista deja o cerere trimisa';
	}
	$com1="SELECT * FROM `prieteni`";
	$x=0;
	$info1=$b->query($com1);
	if($info1->num_rows > 0)
	{
		
		$x=0;
		while($row1=$info1->fetch_assoc())
		{
			if(($row1['Persoana1']==$_SESSION['email'] && $row1['Persoana2']==$destinatar) || ($row1['Persoana2']==$_SESSION['email'] && $row1['Persoana1']==$destinatar))
				$x=1;
		}
		if($x==1)
			echo 'Sunteti prieteni deja';
	}
		if($a==0 && $x==0)
		{
			
			$utilizator="Insert into `cereri` values ('".$_SESSION['email']."','".$destinatar."')"; 
			if(mysqli_query($b,$utilizator))
            {
                echo "Cerere Trimisa"; 
				header("Location: ../PaginaP.html");
            }
			else
				echo "Datele nu au putut fi adăugate ". mysqli_errno($b). " : ". mysqli_error($b);
		}
	}
	$b->close();
	
?>