<?php
$message = '';
$error = '';




if (isset($_POST["data_submit"])) {
    if (empty($_POST["fname"])) {
        $error = '<label style = " color: red;"> Enter details! </label>';
    } else if (empty($_POST["lname"])) {
        $error = '<label style = " color: red;"> Enter details! </label>';
    } else if (empty($_POST["address"])) {
        $error = '<label style = " color: red;"> Enter details! </label>';
    } else if (empty($_POST["mob_no"])) {
        $error = '<label style = " color: red;"> Enter details! </label>';
    } else {

        if (file_exists('database.json')) {


            $current_data = file_get_contents("database.json");
            $array_data = json_decode($current_data, true);
            $extra = array(
                'name' => $_POST["fname"],
                'last_name' => $_POST["lname"],
                'address' => $_POST["address"],
                'mobile' => $_POST["mob_no"]
            );

            $array_data[] = $extra;
            array_shift($array_data);
            $finalarray = json_encode($array_data);
            file_put_contents("database.json", $finalarray);
            $message = '<label style = " color: green;"> Update successful! </label>';
        }
    }
}
$data = file_get_contents("database.json");
$datafile = json_decode($data);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>profile</title>
    <link rel="stylesheet" href="profile.css" />
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="mainPage.css" />
        <title>Profile</title>
    </head>

    <body style="margin: 0;">
        <nav id="header">
            <p>Advance Secuirity</p>
            <span class="span-class" style="padding-right:200px ;">Welcome, <?php
                                                                            session_start();

                                                                            echo $datafile[0]->name;

                                                                            ?> </span><a class='span-class' href="login.php"><img src="./logo/logout.png" height="17" alt=""> Logout</a>
        </nav>
        <div id="leftdiv">
            <a href="mainPage.php">
                <p><img src="./logo/home.png" height="13" /> Home</p>
            </a>

            <a href="profile.php">
                <p style="color: blue" ;><img src=" ./logo/user.png" height="13" /> My Profile</p>
            </a>
        </div>
        <div class=" container">
            <div class="note">
                <p>Note! administration password can not be changed</p>
            </div>
            <?php
            echo $message;

            ?>
            <form action="" method="post">

                <p> Your Details</p>
                <div id="div_login">
                    <div>
                        <label class="textlabel">First name</label>
                        <input type="text" class="textbox" id="txt_fname" name="fname" value=<?php echo $datafile[0]->name ?> />
                    </div>
                    <div>
                        <label class="textlabel"> Last name</label>
                        <input type="text" class="textbox" id="txt_lname" name="lname" value=<?php echo $datafile[0]->last_name ?> />
                    </div>
                    <div>
                        <label class="textlabel">Address</label><br />
                        <input type="text" class="textbox" id="address" name="address" value="<?php echo $datafile[0]->address ?>" />
                    </div>
                    <div>
                        <label class="textlabel">Mobile No.</label>
                        <input type="contact" class="textbox" id="mob_no" name="mob_no" value=<?php echo $datafile[0]->mobile ?> />
                    </div>

                    <div>
                        <input type="submit" value="update" name="data_submit" id="but_submit" />
                    </div>

                </div>

            </form>

        </div>

    </body>

    </html>