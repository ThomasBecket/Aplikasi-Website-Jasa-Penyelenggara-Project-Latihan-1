<?php

require_once 'backend/login.php';
require_once 'backend/koneksi.php';

Session::start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $db = new koneksidb();
    $db->koneksi();

    $user = new Login($db);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $id_user = $user->login($username, $password, $db);

    if ($id_user) {

        Session::set('id_user', $id_user);
        header("Location: home.php");
        exit();

    }
    
    else {
        $error_message = "Username atau Password Salah";
    }
}

?>

<!DOCTYPE html>

<html>

  <head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
  </head>

  <body>

    <div class="container">
      <div>
        <div>
          <div class="card mt-5 compact-card">

            <div class="card-header">

              <br />

              <h3 class="login">Login</h3>

            </div>

            <div class="card-body">

              <form action="" method="POST">

                <div class="form-group">
                  <label for="username">Username</label>
                  <input class="username-form" type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="username-form" type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>

                <br />

                <button class="login-button" type="submit">Login</button>
              </form>

            </div>

          </div>
        </div>
      </div>
    </div>

  </body>

</html>