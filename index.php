<?php 
session_start();

if (!isset($_SESSION['userId'])) {
	header('Location: login/index.php');
} else {
	header('Location: index/index.php');
}

?>