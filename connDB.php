<?php
	try{
		$options = array(
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

					$conn =new PDO ("mysql:host=localhost;dbname=techno" , 'root' , '',$options);

	}
	catch(PDOException $e){
		echo 'not connected DB ' .$e->getMEssage();
	}
?>
