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
	$b=mysqli_connect( "localhost", "root",'',"FlyTrip");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com="SELECT * FROM `utilizatori`";

	$info=$b->query($com);
	if($info->num_rows > 0)
	{
		$a=0;
        echo '<div class="centrat"></br><h1>Utilizatori</h1></br></br></div>';
	    echo '<div class="grid-container">';
		while($row=$info->fetch_assoc())
		{
		echo '<div class="grid-item">';
		echo '<p style="font-size:18"> Client :</p>';
		echo '<p style="font-size:18"> -- Utilizatorul : '. $row['Nume']."</p>";
        echo '<p style="font-size:18"> -- Date contact : '. $row['Email']."</p>";
		echo '</div>';
		}
        echo '</div>';
	}
	else
	{
		echo "Nu au fost gasiti utilizatori!";
	}
	$b->close();
?>