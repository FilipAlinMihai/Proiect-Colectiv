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
	#apreciere
	{
		border-radius: 50%;
		background-color: #00BFFF;
		padding: 10px 15px;
			font-size: 14x;
			box-shadow: 0 9px #999;
	}
	</style>
	";
	$b = new mysqli('localhost', 'root', '', 'FlyTrip');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `postare`"; 
	
	$numar=0;
	$info = $b->query($com);
	echo '<div class="centrat"></br><h1>Postari Noi</h1></br></br></div>';
	echo '<div class="grid-container">';
	if ($info->num_rows > 0) {
		
	while($row = $info->fetch_assoc()) {
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
		<tr> <td><input type="submit" value="Comentarii" class="button"></td>  </tr>
		</table>
		</form>';
		echo '<form action="Apreciere.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td></td>  <td><input type="hidden" name="ida" value="'.$row['Numar'].'"/></td></tr>
		<tr> <td><input type="submit" value="Apreciaza" id="apreciere" class="button"></td>  </tr>
		</table>
		</form>';
		$com = "SELECT count(Postare) FROM `apreciere` where Postare=".$row['Numar']."";

		$numar = $b->query($com);
		$rand=$numar->fetch_assoc();
		

		$interogare= "SELECT * from `apreciere` where Postare='".$row['Numar']."' and Persoana='".$_SESSION['email']."'";
		$aprec= $b->query($interogare);
		if($aprec->num_rows>0)
			echo 'Apreciata</br></br>';
		echo 'Aprecieri:'.$rand['count(Postare)'];

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