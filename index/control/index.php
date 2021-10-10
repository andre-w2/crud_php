<?php 

if (isset($_GET['del'])) {
	$del = $db -> query("DELETE FROM register WHERE id = ?i", $_SESSION['userId']);
	unset($_SESSION['userId']);
	header('Location: /');
}

?>