<?php
    session_start();
	$p1=$_POST["prieten"];
    $postare=$_POST['postare'];
	
	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	
    $com="SELECT * FROM `recomandariprieteni`";
	$bc=0;
	$info=$b->query($com);
	if($info->num_rows > 0)
	{
		$a=0;
		$bc=0;
		while($row=$info->fetch_assoc())
		{
			if($row['Utilizator2']==$_SESSION['email'] && $row['Utilizator1']==$p1 && $row['Postare']==$postare)
				$a=1;
		}
		if($a==1)
			echo 'Exista deja o recomandare trimisa';
	}
		
        $a="INSERT INTO recomandariprieteni VALUES ('".$p1."','".$_SESSION['email']."','".$postare."')";
        
        if(mysqli_query($b,$a)){
            header("Location: AfisarePostari.php#".$postare."");
        }
        else
          echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
$b->close();
?>