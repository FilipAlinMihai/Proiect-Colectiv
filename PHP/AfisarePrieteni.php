<?php
	session_start();

	$b = new mysqli('localhost', 'root', '', 'FlyTrip');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `prieteni` where persoana2='".$_SESSION['email']."' OR persoana1='".$_SESSION['email']."'"; 
	

	$info = $b->query($com);
	echo '<div class="centrat"></br><h1>Prieteni</h1></br></br></div>';
	echo '<div class="grid-container">';
	if ($info->num_rows > 0) {
	while($row = $info->fetch_assoc()){
     
		echo '<div class="grid-item">';
		echo '<p style="font-size:18"> --Persoana1: '. $row['Persoana1']."</p>";
		echo '<p style="font-size:18"> -- Persoana2 : '. $row['Persoana2']."</p>";
        echo '--------------------------------------------------------------------';
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