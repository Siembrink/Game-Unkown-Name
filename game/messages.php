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
                                <?php
                                $query = mysqli_prepare($connection_world, "SELECT * FROM message WHERE `to` = ?");
                                mysqli_stmt_bind_param($query, "s", $_SESSION['name']);
                                mysqli_stmt_execute($query);
                                mysqli_stmt_bind_result($query, $id, $from, $to, $date, $read, $message);

                                $i = 1;
                                echo '<table class="table">';
                                echo '<thead><th>From</th><th>Date</th><th>Read</th></thead>';
                                while (mysqli_stmt_fetch($query)) {
                                    echo '<form method="GET" action="profile.php">';
                                    echo '<tr>';

                                    echo '<td>#' . $i . '</td>';
                                    echo '<td>' . $from . '</td>';
                                    echo '<td>' . $date . '</td>';

                                    echo '<td>' . $read . '</td>';
                                    echo'<input type="hidden" name="message-id" value="' . $id . '">';

                                    echo '<td><input type="submit" class="btn btn-primary" name="read-message" value="Read message"></td>';
                                    echo '</form>';
                                    echo '</tr>';
                                    $i = $i + 1;
                                }
                                echo '</table>';
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