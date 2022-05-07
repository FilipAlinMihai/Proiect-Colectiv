<?php
	$id=$_POST["poze"];
	$tip=$_POST["tip3"];
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
		grid-template-columns: auto;
		
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
	div.grid-item:hover 
	{
		border: 5px solid #0066cc;
	}
	.grid-item 
	{
		margin: auto;
		border: 4px solid #00BFFF;
		text-align: center;
        width:50%;
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
	
	$numar=0;
	$info = $b->query($com);
	echo '<div class="centrat1"></br><h1>Pozele Postarii</h1></br></br></div> </br>';
	echo '<div class="grid-container">';
	if ($info->num_rows > 0) {
		
	while($row = $info->fetch_assoc()) {
        if($row['Numar']==$id){
		echo '<div class="grid-item">';
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Imagine1'] ).'" width="350" height="200" id="imagine" name="imgs"/></br>';
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Imagine2'] ).'" width="350" height="200" id="imagine" name="imgs"/></br>';
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Imagine3'] ).'" width="350" height="200" id="imagine" name="imgs"/></br>';
		echo '</div>';
        }
	}

	echo '</div>';
	echo "<div class='centrat'>";
	if($tip=='1')
			echo '<br><a href="AfisarePostari.php#'.$id.'" ><button class="button">Pagina Principală</button></a>';
			else if($tip=='2')
				echo '<br><a href="PostariApreciate.php#'.$id.'" ><button class="button">Pagina Principală</button></a>';
				else if ($tip=='3') 
					echo '<br><a href="PostariComentate.php#'.$id.'" ><button class="button">Pagina Principală</button></a>';
					else if($tip=='4')
						echo '<br><a href="PostariPropri.php#'.$id.'" ><button class="button">Pagina Principală</button></a>';
						else if($tip=='6')
						echo '<br><a href="AfisareRecP.php#'.$id.'" ><button class="button">Pagina Principală</button></a>';
	echo '</div>';
	echo '</br></br></br></br>';
	}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	
	$b->close();


?>