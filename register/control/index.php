<?php 

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

            if ($loginNumRows) {
            	$errors = true;
            	errors('Такой логин существует!');
            }

            $emailQuery = $db -> query("SELECT * FROM register WHERE email = ?s ", $email);
            $emailNumRows = $db -> numRows($emailQuery);

            if ($emailNumRows) {
            	$errors = true;
            	errors('Такой email существует!');
            }

            if (!$errors) {
                $query = $db -> query("INSERT INTO register (login, password, email) VALUES (?s, ?s, ?s)", $login, $pass, $email);
            	
            	if ($query) {
            		success('Успешно');
            		echo "<script>setTimeout(() => {
            			location.href = '/'
            		}, 3000)</script>";
            		$_SESSION['login'] = $login;
            		$_SESSION['pass'] = $pass;
            		$_SESSION['email'] = $email;
            	}
            }

        }
	}
}

?>