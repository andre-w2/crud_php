<?php 

$userid = $db -> query("SELECT * FROM register WHERE login = ?s AND password = ?s AND email = ?s", $_SESSION['login'], $_SESSION['pass'], $_SESSION['email']);
$fetch = $db -> fetch($userid);

if (isset($_POST['login'])) {

	foreach($_POST as $key=>$value){
        $_POST[$key] = XSS($value);
    }

	$login = (!empty($_POST['login'])) ? $_POST['login'] : false;
	$pass = (!empty($_POST['pass'])) ? $_POST['pass'] : false;
	$email = (!empty($_POST['email'])) ? $_POST['email'] : false;

	if (!(strlen($login) >= 30 && strlen($pass) >= 50 && strlen($email) >= 30)) {
		if ($login && $pass && $email) {
			$errors = false;
			$pass = md5(sha1(md5($pass)));

			$loginQuery = $db -> query("SELECT * FROM register WHERE login = ?s ", $login);
            $loginNumRows = $db -> numRows($loginQuery);

            $emailQuery = $db -> query("SELECT * FROM register WHERE email = ?s ", $email);
            $emailNumRows = $db -> numRows($emailQuery);

            $passQuery = $db -> query("SELECT * FROM register WHERE password = ?s ", $pass);
            $passNumRows = $db -> numRows($passQuery);


            if (!$emailNumRows || !$loginNumRows || !$passNumRows) {
            	$errors = true;
            	errors('Такой пользователя не существует!');
            }

            if (!$errors) {
                $_SESSION['userId'] = $fetch['id'];
                success('Успешно вошли!');
                echo "<script>setTimeout(() => {
                       location.href = '/'
                }, 3000)</script>";   
            }
        }
	}
}

?>