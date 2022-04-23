<?php
	
	session_start();
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
		grid-template-columns: auto auto;
		
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
	.button
		{
			border-radius: 50%;
		background-color: #00BFFF;
		padding: 10px 15px;
			font-size: 19x;
			box-shadow: 0 9px #999;
			font-family: Arial, Helvetica, sans-serif;
		font-weight: bold;
		}
	#apreciere
	{
		border-radius: 50%;
		background-color: #00BFFF;
		padding: 10px 15px;
			font-size: 19x;
			box-shadow: 0 9px #999;
	}
	.centrat1
	{
		width: 300px;
		text-align: center;
		margin: auto;
		padding: 10px 15px;
		background-color: lightblue;
		border-radius: 30px;
	}
	.continut{

		width: 600px;
		text-align: center;
		margin: auto;
	}
	p {
		font-family: Arial, Helvetica, sans-serif;
		font-weight: bold;
	  }
	.textinput{
		width: 100%;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 4px;
		font-size:110%;
		background-color: white;
		background-position: 10px 10px; 
		background-repeat: no-repeat;
		padding:3px;
	}
	#imagine{
		padding:15px;
	}
	</style>
	";
	$b = new mysqli('localhost', 'root', '', 'FlyTrip');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `postare`"; 
	

	$info = $b->query($com);
	echo '<div class="centrat1"></br><h1>Postarile mele</h1></br></br></div></br>';
	echo '<div class="grid-container">';
	if ($info->num_rows > 0) {
	while($row = $info->fetch_assoc()) {
        if($row['Email']==$_SESSION['email']){
		echo '<div class="grid-item">';
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Imagine1'] ).'" width="350" height="200"/>';
		echo '<p style="font-size:18"> Locatie: '. $row['Locatie']."</p>";
		echo '<p style="font-size:18"> -- Email : '. $row['Email']."</p>";
		echo '<p style="font-size:18"> -- Tip: '. $row['Tip']."</p>";
		echo '<p style="font-size:18"> -- Descriere: '.$row['Descriere']."</p>";
		echo '<p style="font-size:18"> --ID: '.$row['Numar']."</p>";
		echo '<p style="font-size:18"> --Lasa un comentariu</p> </br> 
		<form action="Com.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td>Comentariu</td>  <td><input type="text" name="coment" value=""/></td></tr>
		<tr> <td></td>  <td><input type="hidden" name="id" value="'.$row['Numar'].'"/></td></tr>
		<tr> <td><input type="submit" value="adauga" class="button"></td>  </tr>
		</table>
		</form>';
		echo '<form action="AfisareCom.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td></td>  <td><input type="hidden" name="id" value="'.$row['Numar'].'"/></td></tr>
		<tr> <td><input type="submit" value="Afisare" class="button"></td>  </tr>
		</table>
		</form>';
        echo '<form action="StergePost.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td></td>  <td><input type="hidden" name="ids" value="'.$row['Numar'].'"/></td></tr>
		<tr> <td><input type="submit" value="Sterge" class="button"></td>  </tr>
		</table>
		</form>';
		echo '</br><form action="Poze.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td></td>  <td><input type="hidden" name="poze" value="'.$row['Numar'].'"/></td></tr>
		<tr> <td><input type="submit" value="Pozele" id="pozele" class="button"></td>  </tr>
		</table>
		</form></br>';
		echo '</div>';
        }
	}

	echo '</div>';
	echo "<div class='centrat'>";
	echo '<br><a href="../PaginaP.html"><button class="button" >Pagina Principală</button></a>';
	echo '</div>';
	echo '</br></br></br></br>';
	}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	
	$b->close();


?>