<?php
    session_start();
	$b = new mysqli('localhost', 'root', '', 'FlyTrip');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `cereri`"; 
	

	$info = $b->query($com);
	echo '<div class="centrat"></br><h1>Cereri Primite</h1></br></br></div>';
	echo '<div class="grid-container">';
	if ($info->num_rows > 0) {
	while($row = $info->fetch_assoc()){
     if($_SESSION['email']==$row['Destinatar']){
		echo '<div class="grid-item">';
		echo '<p style="font-size:18"> --Crere de la : '. $row['Utilizator']."</p>";
		echo '<form action="AcceptaPrieten.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td></td>  <td><input type="hidden" name="persoana1" value="'.$row['Utilizator'].'"/></td></tr>
		<tr> <td><input type="submit" value="Acceptare" class="button"></td>  </tr>
		</table>
		</form>';
     }
		echo '</div>';
	}

	echo '</div>';
	echo "<div class='centrat'>";
	echo '<br><a href="../PaginaP.html"><button >Pagina Principală</button></a>';
	echo '</div>';
	echo '</br></br></br></br>';

}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	
	$b->close();


?>