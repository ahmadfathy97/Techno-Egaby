<?php
session_start();
if (isset($_SESSION['user'])) {

	echo 'User : '.$_SESSION['user'].'<br>';
	echo '<a href="logout.php"> logut</a><br>';
	echo '<a href="edituser.php">edit</a><br>';
	include '../connDB.php';
	if (isset($_GET['id'])&& is_numeric($_GET['id'])) {
		$id_video = $_GET['id'];
		if (isset($_GET['del'])) {
			$del = $conn->prepare("DELETE FROM video WHERE id = '$id_video'");
			$del->execute();
			header('location:index.php');
		}
		$Allvideo=$conn->prepare("SELECT * FROM video WHERE id = '$id_video' ");
		$Allvideo->execute();
		$video=$Allvideo->fetch();
		$count =  $Allvideo->rowCount();
		if ($count != 1) {
			echo 'error :(';
		}else{
			
			echo '<a href="?del&id='.$video['id'].'">Confirm Delete</a>';

		}
	}else{
		echo 'error :(';
	}
	
}else{
	header('location:login.php');
}

?>


