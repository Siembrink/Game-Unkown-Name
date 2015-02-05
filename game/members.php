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
                            <div class="panel-heading"><h4>Members</h4></div>
                            <div class="panel-body">
                                <?php
                                $banned = 0;
                                $query = mysqli_prepare($connection_world, "SELECT player_name, rank FROM player WHERE banned = ?");
                                mysqli_stmt_bind_param($query, "i", $banned);
                                mysqli_stmt_execute($query);
                                mysqli_stmt_bind_result($query, $name, $rank);

                                $i = 1;
                                echo '<table class="table">';
                                echo '<thead><th>Nr.</th><th>Name</th><th>Rank</th><th>Profile</th></thead>';
                                while (mysqli_stmt_fetch($query)) {
                                    echo '<form method="GET" action="profile.php">';
                                    echo '<tr>';

                                    echo '<td>#' . $i . '</td>';
                                    echo '<td>' . $name . '</td>';
                                    echo '<td>' . $rank . '</td>';
                                    echo'<input type="hidden" name="profile-name" value="' . $name . '">';
                                    echo '<td><input type="submit" class="btn btn-primary" name="profile" value="' . $name . '\'s profile"></td>';
                                    echo '</form>';
                                    echo '</tr>';
                                    $i = $i + 1;
                                }
                                echo '</table>';
                                ?>
                            </div>
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