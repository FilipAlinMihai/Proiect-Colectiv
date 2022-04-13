<?php
	echo "<style>
	body 
	{  
		background-image: url('../imagini/background1.jpg');
		background-size: 1700px 2000px;
	} 
	.centrat
	{
		text-align:center;
	}
	.grid-container
	{
		
		display: grid;
		grid-template-columns: auto auto auto;
	}
	
	div.grid-item:hover 
	{
		border: 5px solid #0066cc;
	}
	.grid-item 
	{
		margin: 7px;
		border: 4px solid #00BFFF;
		text-align: center;
	}
	button
		{
			font-size:130%;
			border-radius: 12px;
			background-color: #00BFFF;
			color: white;
		}
	</style>
	";
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
		if( $row['Persoana1']==$_SESSION['email']){
		echo '<div class="grid-item">';
		echo '<p style="font-size:18"> Sunteti prieten cu :</p>';
		echo '<p style="font-size:18"> -- Utilizatorul : '. $row['Persoana2']."</p>";
		echo '</div>';
		}
		else{
		echo '<div class="grid-item">';
		echo '<p style="font-size:18"> Sunteti prieten cu :</p>';
		echo '<p style="font-size:18"> -- Utilizatorul : '. $row['Persoana1']."</p>";
		echo '</div>';
		}
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