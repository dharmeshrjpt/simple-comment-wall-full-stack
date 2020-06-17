<?php
session_start();
$message = '';
$error = '';
$data = file_get_contents("database.json");
$datafile = json_decode($data);

if (isset($_POST["submit"])) {
  if (empty($_POST["comment-box"])) {
    $error = '<label style = " color: red;"> Enter some comment! </label>';
  } else {
    if (file_exists('comments.json')) {


      $current_data = file_get_contents("comments.json");
      $array_data = json_decode($current_data, true);
      $extra = array(
        'text' => $_POST["comment-box"],
        'time' => date(" jS  F Y h:i:s A"),
        'name' => $datafile[0]->name
      );

      $array_data[] = $extra;
      array_shift($array_data);
      $finalarray = json_encode($array_data);
      file_put_contents("comments.json", $finalarray);
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="mainPage.css" />
  <link rel="stylesheet" href="drop.css" />
  <title>Profile</title>
</head>

<body style="margin: 0;">
  <nav id="header">
    <p>Advance Secuirity</p>

    <span class="span-class" style="padding-right:200px ;">
      Welcome, <?php
                echo $datafile[0]->name;
                ?>
    </span>
    <a class='span-class' href="login.php"><img src="./logo/logout.png" height="17" alt=""> Logout</a>
  </nav>
  <div id="leftdiv">
    <a href="mainPage.php">
      <p style="color: blue" ;><img src="./logo/home.png" height="13" /> Home</p>
    </a>

    <a href="profile.php">
      <p onclick="profile.php"><img src="./logo/user.png" height="13" /> My Profile</p>
    </a>
  </div>
  <div id="rightdiv">
    <p class="commentpara">Comments Wall</p>
    <span style="color: gray;">last 7 posts</span>
    <?php
    $data = file_get_contents("comments.json");
    $arrayData = json_decode($data, true);
    foreach (array_reverse($arrayData) as $row) {
      echo '<div class= "comment"><p style = " padding-left: 10px">' . $row["text"] . '</p><p style="font-size: small;padding-left: 10px; display: inline-block"> ' . $row['name'] . '</p> <span style="font-size: x-small; color: gray; ">';
      echo $row["time"] .
        '</span></div>';
    }
    ?>
    <h3>Leave comment</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <?php
      if (isset($error)) {
        echo $error . '<br>';
      }
      ?>
      <input type="text" name="comment-box" class="commentbox" id="cmnt_box" /> <br>
      <input type="submit" value="comment" name="submit" id="but_comment" />
    </form>

  </div>
</body>

</html>