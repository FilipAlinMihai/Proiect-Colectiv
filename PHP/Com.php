<?php
	session_start();
    $coment=$_POST["coment"];
	$id=$_POST["id"];

	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com="SELECT * FROM `postare`";
		$info=$b->query($com);

		$codul=1;
		$verif=1;
		while($codul<100000 && $verif==1)
		{
			$comanda="select * from `comentarii`";
			$info1=$b->query($comanda);
			$verif=0;
			while($row1=$info1->fetch_assoc())
			{
				if($row1['ID']==$codul)
				$verif=1;	
			}
			if($verif==0 )
				break;
			$codul=$codul+1;
		}
   
    $adauga="Insert into `comentarii` values (".$codul.",'".$coment."','".$id."','".$_SESSION['email']."')";
	if(mysqli_query($b,$adauga)){
		header("Location: AfisarePostari.php");
	}
	 	else
			echo  '<script>alert("Procesul eşuat". mysqli_errno($b). " : ". mysqli_error($b))</script>';
    
    
$b->close();
?>