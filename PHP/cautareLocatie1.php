<?php
	session_start();
	echo "<style>
	body 
	{  
		background-image: url('../imagini/background15.jpg');
		background-size: 1700px 2000px;
	} 
	.centrat
	{
		width: 300px;
		text-align: center;
		margin: auto;
		padding: 10px 15px;
		background-color: lightblue;
		border-radius: 30px;
	}
	.centrat1
	{
		text-align: center;
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
		background-color: 	#f5f5dc;
		color: black;
		border-radius: 30px;
	}
	.button
		{
			border-radius: 50%;
		background-color: #00BFFF;
		padding: 10px 15px;
			font-size: 19x;
			
			font-family: Arial, Helvetica, sans-serif;
		font-weight: bold;
		}
	#apreciere
	{
		border-radius: 50%;
		background-color: #00BFFF;
		padding: 10px 15px;
			font-size: 19x;
			
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
	$a=0;
	if ($info->num_rows > 0) {
	
	echo '<div class="centrat"></br><h2>Rezultatele Căutării</h2></br></br></div>';
	echo '<div class="grid-container">';
	while($row = $info->fetch_assoc()) {
		if( str_contains($row['Locatie'], $_SESSION['Locatie']))
		{
			$a=1;
	
			echo '<div class="grid-item">';
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Imagine1'] ).'" width="350" height="200" id="imagine" name="imgs"/>';
		echo '<p style="font-size:18" id='.$row['Numar'].'> Locatie: '. $row['Locatie']."</p>";
		echo '<p style="font-size:18"> -- Email : '. $row['Email']."</p>";
		echo '<p style="font-size:18"> -- Tip: '. $row['Tip']."</p>";
		echo '<div class="continut">';
		echo '<p style="font-size:18"> -- Descriere: '.$row['Descriere']."</p>";
		echo '</div>';
		echo '<p style="font-size:18"> --ID: '.$row['Numar']."</p>";
		echo '<p style="font-size:18"> --Lasa un comentariu</p> </br> 
		<form action="Com.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td><p>Comentariu</p></td>  <td><input type="text" name="coment" class="textinput" value=""/></td></tr>
		<tr> <td></td>  <td><input type="hidden" name="id" value="'.$row['Numar'].'"/></td></tr>
		<tr> <td></td>  <td><input type="hidden" name="tip" value="'.'5'.'"/></td></tr>
		<tr> <td><input type="submit" value="Adauga" class="button"></td>  </tr>
		</table>
		</form>';
		echo '<form action="AfisareCom.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td></td>  <td><input type="hidden" name="id" value="'.$row['Numar'].'"/></td></tr>
		<tr> <td></td>  <td><input type="hidden" name="tip1" value="'.'5'.'"/></td></tr>
		<tr> <td><input type="submit" value="Comentarii" class="button"></td>  </tr>
		</table>
		</form>';
			echo '</div>';
			
		}
	}
	if($a==0)
		echo 'Nu au fost găsite rezultate';
	}
	else 
	{
		echo 'Nu au fost găsite rezultate';
	}	
	
	echo '<br><a href="../PaginaP.html"><button class="button">Pagina Principală</button></a>';
	echo '</div>';
	$b->close();
?>