<?php 

if (isset($_GET['yes'])) {
	unset($_SESSION['userId']);
	header('Location: /');
}

?>