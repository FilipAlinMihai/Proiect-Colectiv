<?php

session_start();
	$id=$_POST["ida"];

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
	 	if(mysqli_query($b,$adauga))
         header("Location: AfisarePostari.php");
	 	else
	 		echo "Procesul eşuat". mysqli_errno($b). " : ". mysqli_error($b);
   }
   else
   {
    $com="DELETE FROM `Apreciere` where Postare='".$id."' and Persoana='".$_SESSION['email']."'";

	$info=$b->query($com);
    header("Location: AfisarePostari.php");
   }

?>