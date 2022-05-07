<?php

session_start();
	$id=$_POST["ida"];
	$tip=$_POST["tip2"];
	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
    $com="SELECT * FROM `Apreciere`";

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

?>