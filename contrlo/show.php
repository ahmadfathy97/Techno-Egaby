<?php
session_start();
if (isset($_SESSION['user'])) {

	echo 'User : '.$_SESSION['user'].'<br>';
	echo '<a href="logout.php"> logut</a><br>';
	echo '<a href="edituser.php">edit</a><br>';
	include '../connDB.php';
	if (isset($_GET['id'])&& is_numeric($_GET['id'])) {
		$id_video = $_GET['id'];
		if (isset($_GET['accp'])) {
			$update =$conn->prepare("UPDATE video SET accept= 1  WHERE id='$id_video'") ;
			$update->execute();
			header('location:index.php');
			
		}
		if (isset($_GET['unaccp'])) {
			$update =$conn->prepare("UPDATE video SET accept= 0  WHERE id='$id_video'") ;
			$update->execute();
			header('location:index.php');
			
		}
		$Allvideo=$conn->prepare("SELECT * FROM video WHERE id = '$id_video' ");
		$Allvideo->execute();
		$video=$Allvideo->fetch();
		$count =  $Allvideo->rowCount();
		if ($count != 1) {
			echo 'error :(';
		}else{
			
			echo  'title : '.$video['vid_title'].'<br>';
			echo 'URL : <a href="'.$video['vid_url'].'">'.$video['vid_url'].'</a><br>';
			echo  'Description : '.$video['vid_desc'].'<br>';
			echo  'Name : '.$video['name'].'<br>';
			echo  'connection : '.$video['call_me'].'<br>';
			parse_str(parse_url($video['vid_url'],PHP_URL_QUERY),$arr);
			echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$arr['v'].'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
			echo '<br>';
			echo '<a href="delete.php?id='.$video['id'].'">Delete</a><br>';
			echo '<a href="edit.php?id='.$video['id'].'">edit</a><br>';
			if ($video['accept']==0) {
				echo '<td><a href="?accp&id='.$video['id'].'">accept</a></td>';
			}else{
				echo '<td><a href="?unaccp&id='.$video['id'].'">Unaccept</a></td>';
			}

		}
	}else{
		echo 'error :(';
	}
	
}else{
	header('location:login.php');
}

?>


