<?php
    $postare=$_POST['postare'];
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
		

        echo '<form action="AdaugaRecPrieten.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td></td>  <td><input type="hidden" name="postare" value="'.$postare.'"/></td></tr>
        <tr> <td></td>  <td><input type="hidden" name="prieten" value="'.$row['Persoana2'].'"/></td></tr>
		<tr> <td></td>  <td><input type="hidden" name="tip3" value="'.'1'.'"/></td></tr>
		<tr> <td><input type="submit" value="Recomanda" id="pozele" class="button"></td>  </tr>
		</table>
		</form></br>';

        echo '</div>';
		}
		else{
		echo '<div class="grid-item">';
		echo '<p style="font-size:18"> Sunteti prieten cu :</p>';
		echo '<p style="font-size:18"> -- Utilizatorul : '. $row['Persoana1']."</p>";
		

        echo '<form action="AdaugaRecPrieten.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td></td>  <td><input type="hidden" name="postare" value="'.$postare.'"/></td></tr>
        <tr> <td></td>  <td><input type="hidden" name="prieten" value="'.$row['Persoana1'].'"/></td></tr>
		<tr> <td></td>  <td><input type="hidden" name="tip3" value="'.'1'.'"/></td></tr>
		<tr> <td><input type="submit" value="Recomanda" id="pozele" class="button"></td>  </tr>
		</table>
		</form></br>';

        echo '</div>';
		}

        
	}

	echo '</div>';
	echo "<div class='centrat'>";
	echo '<br><a href="../Paginap.html"><button class="button">Pagina Principală</button></a>';
	echo '</div>';
	echo '</br></br></br></br>';
}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	
	$b->close();


?>