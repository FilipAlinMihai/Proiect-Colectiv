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
	$id=$_POST["id"];
	$tip=$_POST["tip1"];
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
		echo '<p style="font-size:18"> --Comentariu : '. $row['Comentariu']."</p>";
		echo '<p style="font-size:18"> --Utilizator : '. $row['Utilizator']."</p>";
		echo '<p style="font-size:18"> --ID : '. $row['ID']."</p>";
		if($row['Utilizator']==$_SESSION['email'])
		{
		echo '<form action="StergeCom.php" method="post" enctype="multipart/form-data">
		<table>
		<tr> <td></td>  <td><input type="hidden" name="id" value="'.$row['ID'].'"/></td></tr>
		<tr> <td></td>  <td><input type="hidden" name="idp" value="'.$row['IDPostare'].'"/></td></tr>
		<tr> <td></td>  <td><input type="hidden" name="tip" value="'.$tip.'"/></td></tr>
		<tr> <td><input type="submit" value="Sterge" class="button"></td>  </tr>
		</table>
		</form>';

		}
     }
		echo '</div>';
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
	echo '</div>';
	echo '</br></br></br></br>';
}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	
	$b->close();


?>