<?php

session_start();
	$id=$_POST["ida"];
	$tip=$_POST["tip2"];
	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
    $com="SELECT * FROM `Apreciere`";

	$vizitat=0;

	$info=$b->query($com);
	if($info->num_rows > 0)
	{
		$a=0;
		while($row=$info->fetch_assoc())
		{
			if($row['Persoana']==$_SESSION['email'] && $row['Postare']==$id)
				$a=1;
		}
		
	}

	$cautalocatie="SELECT Locatie,Email,Numar from `Postare`";
	$executecautare=$b->query($cautalocatie);
	if($executecautare->num_rows > 0)
	{
		$locatia="";
		while($randurile=$executecautare->fetch_assoc())
		{
			if($randurile['Numar']==$id)
				$locatia=$randurile["Locatie"];
		}
		$cautalocatie1="SELECT Locatie,Email,Numar from `Postare`";
		$executecautare1=$b->query($cautalocatie1);
		if($executecautare1->num_rows > 0)
		while($randurile1=$executecautare1->fetch_assoc())
		{
			if($randurile1['Email']==$_SESSION['email'] && $randurile1['Locatie']==$locatia)
				$vizitat=1;
			
		}
		
	}


	if($vizitat==0)
	{
		if($tip=='1')
			header("Location: AfisarePostari.php#".$id."");
			else if($tip=='2')
				header("Location: PostariApreciate.php#".$id."");
				else if ($tip=='3') 
					header("Location: PostariComentate.php#".$id."");
					else if ($tip=='6') 
					header("Location: AfisareRecP.php#".$id."");
		
	}
	else{
   if($a==0){
    $adauga="Insert into `Apreciere` values ('".$id."','".$_SESSION['email']."')";
	 	if(mysqli_query($b,$adauga)){
			if($tip=='1')
			header("Location: AfisarePostari.php#".$id."");
			else if($tip=='2')
				header("Location: PostariApreciate.php#".$id."");
				else if ($tip=='3') 
					header("Location: PostariComentate.php#".$id."");
					else if ($tip=='6') 
					header("Location: AfisareRecP.php#".$id."");
		 }
        
	 	else
	 		echo "Procesul eşuat". mysqli_errno($b). " : ". mysqli_error($b);
   }
   else
   {
    $com="DELETE FROM `Apreciere` where Postare='".$id."' and Persoana='".$_SESSION['email']."'";

	$info=$b->query($com);
    if($tip=='1')
			header("Location: AfisarePostari.php#".$id."");
			else if($tip=='2')
				header("Location: PostariApreciate.php#".$id."");
				else if ($tip=='3') 
					header("Location: PostariComentate.php#".$id."");
					else if ($tip=='6') 
					header("Location: AfisareRecP.php#".$id."");
					
   }
}

?>