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
                            <div class="panel-heading"><h4>Bullet Factory</h4></div>
                            <p class="page-header" style="padding: 20 30 20 20px;">
                                Welcome to the bullet factory were you can buy bullets to demolish your enemy's or help your friends. Every hour the factory produces a specific amount of bullets. The owner is a clever men. Whenever the factory is almost sold out the owner will ask more money for each bullet you buy.
                            </p>
                            <div class="panel-body">
                                <div class='col-sm-3 col-md-8'>saba</div>
                                <div class='col-sm-3 col-md-4'>
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'>Statistics</div>
                                        <div class='panel-body'>
                                            <table class="table">
                                                <tr>
                                                    <td>Cost:</td>
                                                    <td>111</td>
                                                </tr>
                                                <tr>
                                                    <td>:</td>
                                                    <td>111</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>


                                </div>

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