<?php
include ("../includes/config.php");
include ("includes/functions.php");
loggedIn($_SESSION['name']);
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
                                    <li role="presentation"><a href="edit-profile.php">Profile</a></li>
                                    <li role="presentation" class='active'><a href="messages.php">Messages</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <h4 class="page-header">Inbox</h4>
                                <div align="right">
                                    <label>Send message</label><a href="create_message.php"><button class="btn btn-info" ><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></button></a>
                                </div>
                                <?php
                                $query = mysqli_prepare($connection_world, "SELECT * FROM message WHERE `to` = ?");
                                mysqli_stmt_bind_param($query, "s", $_SESSION['name']);
                                mysqli_stmt_execute($query);
                                mysqli_stmt_bind_result($query, $id, $from, $to, $date, $read, $message, $subject);


                                echo '<table class="table">';
                                echo '<thead><th>#</th><th>From</th><th>Subject</th><th>Date</th><th>Read</th><th>Delete</th></thead>';
                                while (mysqli_stmt_fetch($query)) {
                                    if ($read == 0) {
                                        echo '<form method="POST">';
                                        echo '<tr>';

                                        echo '<td><button type="button" class="btn btn-success" disabled>New</button></td>';
                                        echo '<td>' . $from . '</td>';
                                        echo '<td>' . $subject . '</td>';
                                        echo '<td>' . $date . '</td>';
                                        echo'<input type="hidden" name="message-id" value="' . $id . '">';
                                        echo'<input type="hidden" name="message" value="' . $message . '">';

                                        echo '<td><input type="submit" class="btn btn-primary" name="read-message" value="Read message"></td>';
                                        echo '<td><button type="submit" class="btn btn-danger" name="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>';
                                        echo '';
                                        echo '</form>';
                                        echo '</tr>';
                                    } else {
                                        echo '<form method="POST">';
                                        echo '<tr>';

                                        echo '<td><button type="button" class="btn btn-danger" disabled>Old</button></td>';
                                        echo '<td>' . $from . '</td>';
                                        echo '<td>' . $subject . '</td>';
                                        echo '<td>' . $date . '</td>';
                                        echo'<input type="hidden" name="message-id" value="' . $id . '">';
                                        echo'<input type="hidden" name="message" value="' . $message . '">';

                                        echo '<td><input type="submit" class="btn btn-primary" name="read-message" value="Read message"></td>';
                                        echo '<td><button type="submit" class="btn btn-danger" name="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>';
                                        echo '</form>';
                                        echo '</tr>';
                                    }
                                }
                                echo '</table>';
                                if (isset($_POST['read-message'])) {
                                    $message = $_POST['message'];


                                    echo "<script type='text/javascript'>alert('$message'); </script>";
                                    $read = 1;
                                    $update = mysqli_prepare($connection_world, "UPDATE `message` SET `read` = ? WHERE `id` = ? ");
                                    mysqli_stmt_bind_param($update, "ii", $read, $_POST['message-id']);
                                    mysqli_stmt_execute($update);
                                }

                                if (isset($_POST['delete'])) {
                                    $delete = mysqli_prepare($connection_world, "DELETE FROM `message` WHERE `id` = ? ");
                                    mysqli_stmt_bind_param($delete, "i", $_POST['message-id']);
                                    mysqli_stmt_execute($delete);
                                    header("Refresh;");
                                }
                                ?>
                            </div>
                            <div class='panel-footer'>Account Management</div>
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