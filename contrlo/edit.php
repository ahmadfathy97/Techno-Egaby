<?php
session_start();
if (isset($_SESSION['user'])) {

	echo 'User : '.$_SESSION['user'].'<br>';
	echo '<a href="logout.php"> logut</a><br>';
	echo '<a href="edituser.php">edit Account</a><br>';
	include '../connDB.php';

	if (isset($_GET['id'])&& is_numeric($_GET['id'])) {
		$id_video = $_GET['id'];
		if (isset($_POST['update'])) {
			$vid_title		= filter_var($_POST['vid_title'],FILTER_SANITIZE_STRING);
			$vid_link 		= filter_var($_POST['vid_link'],FILTER_SANITIZE_URL);
			$vid_desc 		= filter_var($_POST['vid_desc'],FILTER_SANITIZE_STRING);
			$name 			= filter_var($_POST['name'],FILTER_SANITIZE_STRING);
			$call  			= filter_var($_POST['call'],FILTER_SANITIZE_STRING);
			$err = array();
			//Valdate video title
			if (empty($vid_title)) {
				$err[]= "the title video must write ";
			}elseif (strlen($vid_title)<3) {
				$err[]= "the title video must more than 3 char ";
			}elseif (strlen($vid_title)>=100) {
				$err[]= "the title video must leth than 100 char ";
			}
			//validate URL  video
			if (empty($vid_link)) {
			 	$err[]= "the URL  video must write ";
			 }else{
			 	if (filter_var($_POST['vid_link'],FILTER_VALIDATE_URL)==false) {
					$err[]="the video link is invald";
				}else{
					$host    = parse_url($_POST['vid_link'],PHP_URL_HOST);
					$protcol = parse_url($_POST['vid_link'],PHP_URL_SCHEME);
					if ($host != "www.youtube.com" || $protcol !="https") {
						$err[]= "link not youtube";
					}else{
						parse_str(parse_url($_POST['vid_link'],PHP_URL_QUERY),$arr);
						if (!isset($arr['v'])) {
							$err[]= "link not id video ";
						}
					}
				}

			}
			
			//validate description video  
			if (strlen($vid_desc)<3 && !empty($vid_desc)) {
				$err[]= "the description video must more than 3 char ";
			}elseif (strlen($vid_desc)>=400) {
				$err[]= "the description video must leth than 3 char ";
			}

			//Valdate name 
			if (empty($name)) {
				$err[]= "the name  video must write ";
			}elseif (strlen($name)<3) {
				$err[]= "the name must more than 3 char ";
			}elseif (strlen($name)>=50) {
				$err[]= "the name must leth than 50 char ";
			}

			//validate call  
			if (strlen($call)<3 && !empty($call)) {
				$err[]= "the call must more than 3 char ";
			}elseif (strlen($call)>=300) {
				$err[]= "the call video must leth than 300 char ";
			}

			if (!empty($err)) {
				foreach ($err as $msgError) {
					echo $msgError . '<br>';
				}
			}else{
				//Update DB
				$update =$conn->prepare("UPDATE video SET vid_title = '$vid_title',
														  vid_url   ='$vid_link',	
														  vid_desc = '$vid_desc' ,
														  name  = '$name' , 
														  call_me = '$call' WHERE id='$id_video'") ;
				$update->execute();
				header('location:index.php');
			}

		}
		$Allvideo=$conn->prepare("SELECT * FROM video WHERE id = '$id_video' ");
		$Allvideo->execute();
		$video=$Allvideo->fetch();
		$count =  $Allvideo->rowCount();
		if ($count != 1) {
			echo 'error :(';
		}else{
			?>
				<form action="" method="POST">
					<label>Title</label><br>
					<input type="text" name="vid_title" value="<?php echo $video['vid_title'] ; ?>"><br>
					<label>link</label><br>
					<input type="text" name="vid_link"  value="<?php echo $video['vid_url'] ; ?>"><br>
					<label>description</label><br>
					<textarea name="vid_desc"  value="<?php echo $video['vid_desc'] ; ?>"></textarea><br>
					<label>name</label><br>
					<input type="text" name="name" value="<?php echo $video['name'] ; ?>"><br>
					<label>call</label><br>
					<textarea name="call" value="<?php echo $video['call_me'] ; ?>"></textarea><br>
					<input type="submit" name="update">
				</form>
			<?php
		}
	}else{
		echo 'error :(';
	}
	
}else{
	header('location:login.php');
}

?>


