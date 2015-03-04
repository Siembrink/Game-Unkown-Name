<?php
include ("../includes/config.php");
include ("includes/functions.php");
loggedIn($_SESSION['name']);
$character = selectPlayer($connection_world, $_SESSION['name']);
$text = $character[7];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Game</title>

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/npm.js"></script>

    </head>
    <body>



        <div class="container-fluid">
            <div class="row">



                <div class="col-md-offset-0 main">
                    <h2 class="page-header">Welcome to the game!</h2>
                    <?php
                    include("layout/navside.php");
                    ?>

                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <ul class="nav nav-pills" role="tablist">
                                    <li role="presentation"><a href="account.php">Account Settings</a></li>
                                    <li role="presentation" class='active'><a href="edit-profile.php">Profile</a></li>
                                    <li role="presentation"><a href="messages.php">Messages</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <form method="post" enctype="multipart/form-data">
                                    <h4 class='page-header'>Upload avatar</h4>
                                    <label>Avatar :</label> <input class="form-control" type='file' name='avatar' /><br />
                                    <input class='btn btn-primary' type="submit" name="upload" value="Upload" />
                                    <input class='btn btn-danger' type="reset" value="Reset" /> <br />
                                </form>
                                <?php
                                ?>
                                <form method='post'>
                                    <h4 class='page-header'>Update profile</h4>
                                    <textarea name='profile_text' rows="10" cols="100" ><?php echo $text; ?> </textarea> <br /><br />
                                    <input class='btn btn-primary' type="submit" name="update" value="Update" />
                                    <input class='btn btn-danger' type="reset" value="Reset" /> <br />
                                </form>
                                <?php
                                if (isset($_POST['update'])) {
                                    if (empty($_POST['profile_text'])) {
                                        echo '<br /><div class="alert alert-danger" role="alert">Oops! Something is going wrong..</div>';
                                    } else {
                                        $text = mysqli_real_escape_string($connection_world, $_POST['profile_text']);

                                        $update = mysqli_prepare($connection_world, "UPDATE player SET profile_text = ? WHERE player_name = ?");
                                        mysqli_stmt_bind_param($update, "ss", $text, $_SESSION['name']);
                                        mysqli_stmt_execute($update);

                                        if ($update) {
                                            echo '<div class="alert alert-success" role="alert">Profile updated!</div>';
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">Oops! Something is going wrong..</div>';
                                        }
                                    }
                                }
                                ?>
                            </div>

                            <div class = 'panel-footer'>Account Management</div>
                        </div>
                    </div>
                    <?php
                    include ("layout/navright.php");
                    ?>

                </div>
            </div>
        </div>
    </body>
</html>