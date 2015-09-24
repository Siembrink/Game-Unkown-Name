<?php
include ("../includes/config.php");
include ("includes/functions.php");
loggedIn($_SESSION['name']);
$world = selectWorldName($connection, 1);
$online = usersOnline($connection_world);
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
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#">
                                    <strong>Welcome to the game</strong>
                                </a>

                            </div>

                            <p class="navbar-text navbar-right">Signed in as <?php echo $_SESSION['name']; ?></p>
                            <p class="navbar-text navbar-right"><?php echo $online; ?> player(s) online</p>
                            <p class="navbar-text navbar-right">World name: <?php echo $world[0]; ?></p>
                        </div>
                    </nav>
                    <?php
                    include("layout/navside.php");
                    ?>

                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h4>Members</h4></div>
                            <div class="panel-body">
                                <?php
                                $banned = 0;

                                $query = mysqli_prepare($connection_world, "SELECT player_name, rank, online FROM player WHERE banned = ?");
                                mysqli_stmt_bind_param($query, "i", $banned);
                                mysqli_stmt_execute($query);
                                mysqli_stmt_bind_result($query, $name, $rank, $online);
                                $currentrank = checkRank($connection_world, $_SESSION['name']);
                                $i = 1;
                                echo '<table class="table">';
                                echo '<thead><th>Nr.</th><th>Name</th><th>Rank</th><th>Status</th><th>Profile</th></thead>';
                                while (mysqli_stmt_fetch($query)) {
                                $rank = searchRank($connection_world, $rank);
                                    echo '<form method="GET" action="profile.php">';
                                    echo '<tr>';

                                    echo '<td>#' . $i . '</td>';
                                    echo '<td>' . $name . '</td>';
                                    echo '<td>' . $rank . '</td>';
                                    if ($online == 0) {
                                        echo '<td><span class="label label-danger">Offline</span></td>';
                                    } else {
                                        echo '<td><span class="label label-success">Online</span></td>';
                                    }
                                    ;
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