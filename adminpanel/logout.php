<?php
ob_start();
session_start();
if (isset($_SESSION['user'])) {
	session_unset();
	header('location:login/');
}
ob_end_flush();
