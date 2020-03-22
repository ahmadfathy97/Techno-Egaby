<?php
ob_start();
session_start();
if (isset($_SESSION['user'])) {
	session_unset();
	header('location:index.php');
}
ob_end_flush();
