<?php
	session_start();
	
    $destinatar=$_POST['destinatar'];

	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	
	$com="SELECT * FROM `cereri`";
	$bc=0;
	$info=$b->query($com);
	if($info->num_rows > 0)
	{
		$a=0;
		$bc=0;
		while($row=$info->fetch_assoc())
		{
			if($row['Utilizator']==$_SESSION['email'] && $row['Destinatar']==$destinatar)
				$a=1;
		}
		if($a==1)
			echo 'Exista deja o cerere trimisa';
	}
		if($a==0)
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
	
	$b->close();
	
?>