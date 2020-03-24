<?php
include "../../connDB.php";
	if (isset($_POST['name'])) {
		$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
		$comm = filter_var($_POST['comment'],FILTER_SANITIZE_STRING);
    $vid_id = filter_var($_POST['id_video'],FILTER_SANITIZE_STRING);

		$ins=$conn->prepare("INSERT INTO comment (name , comment , id_video )
									VALUES ('$name' , '$comm' , '$vid_id')");
		$ins->execute();

		$all = array();

		$qComments= $conn->prepare("SELECT name , comment FROM comment where id_video = $vid_id");
		$qComments->execute();
		$allComments=$qComments->fetchAll(PDO::FETCH_ASSOC);
		foreach ($allComments as $comment) {
			array_push($all, $comment);
		}
		$jsonComments=json_encode($all);
		echo $jsonComments;
	}
?>
