<?php
$error = '';

if (isset($_POST['but_submit'])) {
  $logindata = file_get_contents('login.json');
  $tempdata = json_decode($logindata);


  if (empty($_POST["txt_uname"])) {
    $error = "<label style = ' color: red';> Enter details! </label>";
    $file = 'login.php';
  } elseif ($_POST["txt_uname"] != 'admin') {
    $error = '<label style = " color: red";> incorrect details! </label>';
    $file = 'login.php';
  } else if ($_POST["txt_pwd"] != 'admin') {
    $error = '<label style = " color: red";> incorrect details! </label>';
    $file = 'login.php';
  } else {
    $file = "mainPage.php";
  }
}
?>
<!DOCTYPE html>


<head>
  <link rel="stylesheet" href="login.css" />
</head>
<title>Login</title>

<body>
  <div class="maindiv">
    <?php
    echo $error . "<br/>";
    ?>
    <h1>Advanced Security</h1>
    <div class="container">
      <form action="<?php echo $file ?>" method="post">

        <div id="div_login">
          <p>LOGIN</p>
          <div>

            <label class="textlabel">Username</label>
            <input type="text" class="textbox" id="txt_uname" name="txt_uname" />
          </div>
          <div>
            <label for="password" class="textlabel"> Password</label>
            <input type="password" class="textbox" id="txt_uname" name="txt_pwd" />
          </div>
          <a href="" class="forgot"> forgot Password?</a>
          <div>
            <input type="submit" value="Login" name="but_submit" id="but_submit" />
          </div>
          <p style="font-size: small; padding-left: 80px;">
            or connect with <br />
            <br />
            <img src="./logo/fb.png" height="25" style="padding: 2px;" alt="" />
            <img src="./logo/twitter.png" height="25" style="padding: 2px;" alt="" />
            <img src="./logo/google.png" height="25" style="padding: 2px;" alt="" />
          </p>
        </div>

      </form>

    </div>
    Don't have account? <a href="">Sign up</a>
  </div>

</body>

</html>