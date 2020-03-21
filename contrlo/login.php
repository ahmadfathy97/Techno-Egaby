<?php
session_start();
if (isset($_SESSION['user'])) {
	header('location:index.php');
}
include '../connDB.php';
if (isset($_POST['login'])) {
	$user=$_POST['user'];
	$pass=sha1($_POST['pass']);
	$q_accsess_user=$conn->prepare("SELECT * FROM users 
							WHERE user='$user' AND pass='$pass'");
	$q_accsess_user->execute();
	$count_accsess_user=$q_accsess_user->rowCount();
	if($count_accsess_user==1){
		$_SESSION['user']=$user;
		header('location:index.php');
	}else{
		echo 'not found';
	}
}
?>


<form method="POST">
	<label>username</label><br>
	<input type="text" name="user"><br>
	<label>Password</label><br>
	<input type="password" name="pass"><br><br>
	<input type="submit" name="login" value="login">
</form>