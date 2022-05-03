<?php
	$nume=$_POST["numeP"];
	echo "<style>
	body 
	{  
		background-image: url('../imagini/background15.jpg');
		background-size: 1700px 2000px;
	} 
	.centrat
	{
		text-align:center;
	}
	.grid-container
	{
		
		display: grid;
		grid-template-columns: auto;
	}
	
	div.grid-item:hover 
	{
		border: 5px solid #0066cc;
	}
	.grid-item 
	{
		margin: auto;
		border: 4px solid #00BFFF;
		text-align: center;
		width: 50%;
		background-color: lightblue;
		border-radius: 35px;
		padding: 20px;
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
	</style>
	";
	
	$b = new mysqli('localhost', 'root', '', 'FlyTrip');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `utilizatori`"; 
	
	$info = $b->query($com);
	$a=0;
	if ($info->num_rows > 0) {
	
	echo '<div class="centrat"></br><h2>Rezultatele Căutării</h2></br></br>';
	while($row = $info->fetch_assoc()) {
		if( str_contains($row['Email'], $nume))
		{
			$a=1;
	
			echo '<div class="grid-item">';
			echo '<p style="font-size:18"> -- Email -- : '. $row['Email']."</p>";
			echo '<p style="font-size:18"> -- Nume -- : '. $row['Nume']."</p>";
            echo '<p style="font-size:18"> --Trimite cerere de prietenie</p> </br> 
		    <form action="TrimiteCereri.php" method="post" enctype="multipart/form-data">
		    <table>
		    <tr> <td></td>  <td><input type="hidden" name="destinatar" value="'.$row['Email'].'"/></td></tr>
		    <tr> <td><input type="submit" value="Trimite" class="button"></td>  </tr>
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