<form action="" method="POST">
  <fieldset>
    <legend>Вход PHP</legend>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <label for="login">Логин: </label>
        <input type="text" id="login" name="login" placeholder="Логин" required />
      </div>
      <div class="col-sm-12 col-md-6">
        <label for="password">Пароль: </label>
        <input type="password" id="password" name="pass" placeholder="Password" required />
      </div>
       <div class="col-sm-12 col-md-6">
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" placeholder="Email" required />
      </div>
    </div>
  </fieldset>
  <button class="primary">Войти</button>
  <a href="../register/index.php">Создать аккаунт</a>
</form>
