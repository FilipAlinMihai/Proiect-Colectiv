<?php

	$nume=$_POST["numeuADM"];
	$parola=$_POST["parolaA"];

	if($nume=="Admin" && $parola=="Parola")
		  header("Location: ../PA.html");
	else
		echo "Pagina aceasta este dedicată administratorilor";
		
?>