<?php
include ("../includes/config.php");
include ("includes/functions.php");

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

                        <?php
                        $query = mysqli_query($connection, "SELECT * FROM news ");
                        while ($row = mysqli_fetch_row($query)) {

                            echo '<div class="panel panel-default">';
                            echo '<div class="panel-heading">' . $row[1] . '</div>';
                            echo '<div class="panel-body">';
                            echo $row[2];
                            echo '</div>';
                            echo '<div class="panel-footer">Posted by : ' . $row[3] . '';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>

                    </div>

                    <?php
                    include ("layout/navright.php");
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>