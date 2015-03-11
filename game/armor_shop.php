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
                            <div class="panel-heading">

                                <ul class="nav nav-pills" role="tablist">
                                    <li role="presentation" ><a href="shop.php">Weapon Shop</a></li>
                                    <li role="presentation" class='active'><a href="armor_shop.php">Armor Shop</a></li>

                                </ul>
                            </div>
                            <p class="page-header" style="padding: 20 30 20 20px;">
                                Welcome to the weapon shop! Here you can buy dangerous weapons for you well earned money.
                            </p>
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <?php
                                        $shop = mysqli_prepare($connection_world, "SELECT * FROM weapon_shop");
                                        mysqli_stmt_execute($shop);
                                        mysqli_stmt_bind_result($shop, $id, $name, $cost, $damage, $image);
                                        while (mysqli_stmt_fetch($shop)) {
                                            echo '<div class="col-sm-3">';
                                            echo '<div class="thumbnail">';
                                            echo '<img src="' . $image . '" alt="Weapon">';
                                            echo '<div class="caption">';
                                            echo '<h3>' . $name . '</h3>';
                                            echo '<p>Price : ' . $cost . ' Damage : ' . $damage . ' </p>';

                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class='panel-footer'>Armor Shop</div>
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