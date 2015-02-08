<?php
include("includes/config.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-6 col-md-4" ></div>
                <div class="col-sm-6 col-md-2" >
                    <h3>Inloggen</h3>
                    <form align="center" method="post">
                        <label>Username</label> <input class="form-control" type="text" name="name"/> <br />
                        <label>Password</label> <input class="form-control" type="password" name="password" /> <br />
                        <input class='btn btn-primary' type="submit" name="login" value="Log in" />
                        <input class='btn btn-danger' type="reset" value="Reset" /> <br />
                    </form>
                    <?php
                    if (isset($_POST['login'])) {

                        if ($_POST['name'] == "" || $_POST['password'] == "") {
                            echo '<br /><div class="alert alert-danger" role="alert">Oops! Something is going wrong..</div>';
                            exit();
                        }

                        // mysql injection protection:
                        $name = mysqli_real_escape_string($connection, $_POST['name']);
                        $password = mysqli_real_escape_string($connection, (sha1($_POST['password'])));

                        $query = mysqli_prepare($connection, "SELECT username, webrank FROM user WHERE username = ? AND password = ?");
                        mysqli_stmt_bind_param($query, "ss", $name, $password);
                        mysqli_stmt_execute($query);
                        mysqli_stmt_bind_result($query, $name, $rank);
                        while (mysqli_stmt_fetch($query)) {

                            $_SESSION['name'] = $name;
                            $_SESSION['rank'] = $rank;


                            $update = "UPDATE player SET online = 1 WHERE player_name = '$name'";
                            mysqli_query($connection_world, $update);

                            $check = "SELECT player_name FROM player WHERE player_name = '$name'";
                            $result = mysqli_query($connection_world, $check);
                            $count = mysqli_num_rows($result);
                            if (!$count) {
                                $insert = "INSERT INTO player (player_name) VALUES ('$name')";
                                mysqli_query($connection_world, $insert);
                                echo "<script type='text/javascript'>alert('Your first time in this world! Your account has been made!'); window.location.href = 'game/index.php';</script>";
                            } else {
                                echo "<script type='text/javascript'>alert('Succes!'); window.location.href = 'game/index.php';</script>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>