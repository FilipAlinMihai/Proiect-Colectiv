<?php
	//header("content-type:image/jpeg");
	$id=$_POST["id"];

	$b = new mysqli('localhost', 'root', '', 'FlyTrip');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `comentarii`"; 
	

	$info = $b->query($com);
	echo '<div class="centrat"></br><h1>Comentarii</h1></br></br></div>';
	echo '<div class="grid-container">';
	if ($info->num_rows > 0) {
	while($row = $info->fetch_assoc()){
     if($id==$row['IDPostare']){
		echo '<div class="grid-item">';
		echo '<p style="font-size:18"> --Comentariu: '. $row['Comentariu']."</p>";
		echo '<p style="font-size:18"> -- Utilizator : '. $row['Utilizator']."</p>";
     }
		echo '</div>';
	}

	echo '</div>';
	echo "<div class='centrat'>";
	echo '<br><a href="AfisarePostari.php"><button >Pagina Principală</button></a>';
	echo '</div>';
	echo '</br></br></br></br>';
}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	
	$b->close();


?>