<?php
include ("../../includes/config.php");
include ("../includes/functions.php");
loggedIn($_SESSION['name']);
$world = selectWorldName($connection, 1);
$online = usersOnline($connection_world);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Game</title>

    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/npm.js"></script>

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
            include("../layout/navside.php");
            ?>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation"><a href="index.php">Game Settings</a></li>
                            <li role="presentation"><a href="statistics.php">Statistics</a></li>
                            <li role="presentation" class="active"><a href="logs.php">Logs</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <p>Game logs</p>
                    </div>
                </div>
            </div>
            <?php
            include ("../layout/navright.php");
            ?>

        </div>
    </div>
</div>
</body>
</html>