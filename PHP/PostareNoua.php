<?php
    $descriere=$_POST["descriere"];
	$locatie=$_POST["locatie"];
	$email=$_POST["email"];
	$tip=$_POST["tip"];
	$imagine=addslashes (file_get_contents($_FILES['imagine']['tmp_name']));
	$imagine2=addslashes (file_get_contents($_FILES['imagine2']['tmp_name']));
    $imagine3=addslashes (file_get_contents($_FILES['imagine3']['tmp_name']));
	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com="SELECT * FROM `postare`";
		$info=$b->query($com);


    $codul=1;
	$verif=1;
	while($codul<1000 && $verif==1)
	{
		$comanda="select * from `postare`";
		$info1=$b->query($comanda);
		$verif=0;
		while($row1=$info1->fetch_assoc())
		{
			if($row1['Numar']==$codul)
			$verif=1;	
		}
		if($verif==0 )
			break;
		$codul=$codul+1;
	}
	date_default_timezone_set("Europe/Bucharest");
	$d=date("Y/m/d ").date("h:i");
    $postare="Insert into `postare` values ('".$locatie."','".$email."','".$tip."','".$descriere."',".$codul.",'".$imagine."','".$imagine2."','".$imagine3."','".$d."')";
		if(mysqli_query($b,$postare))
			echo "Postarea a fost adăugată";
		else
			echo "Procesul eşuat". mysqli_errno($b). " : ". mysqli_error($b);
    
    
$b->close();
?>
