<?php
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
   </style>";
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
		
		$com = "SELECT count(Numar) FROM `postare` WHERE Email='".$row['Email']."'";

		$numar = $b->query($com);
		$rand=$numar->fetch_assoc();
		echo '<p>--Numar Postari adaugate:  '.$rand['count(Numar)'].'</p>';

		$com = "SELECT count(IDPostare) FROM `comentarii` WHERE Utilizator='".$row['Email']."'";

		$numar = $b->query($com);
		$rand=$numar->fetch_assoc();
		echo '<p>--Numar Comentarii adaugate:  '.$rand['count(IDPostare)'].'</p>';

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