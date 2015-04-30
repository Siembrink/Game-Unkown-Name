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
                                    <li role="presentation" class='active'><a href="shop.php">Weapon Shop</a></li>
                                    <li role="presentation"><a href="armor_shop.php">Armor Shop</a></li>

                                </ul>
                            </div>
                            <p class="page-header" style="padding: 20 30 20 20px;">
                               HalloWelcome to the weapon shop! Here you can buy dangerous weapons for you well earned money. You can only have one weapon at the time. Buy a new weapon and the old will be gone, forever.
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
                                            echo '<img src="' . $image . '" alt="Weapon width="800" height="400" ">';
                                            echo '<div class="caption">';
                                            echo '<h3>' . $name . ' </h3>';
                                            echo '<form method="POST">';
                                            echo '<input type="hidden" name="weap_name" value="' . $name . '">';
                                            echo '<input type="hidden" name="cost" value="' . $cost . '">';
                                            echo '<a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-eur" aria-hidden="true"></span> ' . $cost . ',-</a> ';
                                            echo '<a href="#" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span>' . $damage . '</a></p>';
                                            echo '<input type="submit" class="btn btn-primary" value="Buy" name="buy"> ';

                                            echo '</form>';
                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }


                                        ?>

                                    </div>

                                </div>
                                <?php
                                if (isset($_POST['buy'])) {
                                    $money = currMoney($connection_world, $_SESSION['name']);
                                    $name = $_SESSION['name'];
                                    $money = $money - $_POST['cost'];
                                    if ($money < 0) {
                                        echo '<div class="alert alert-danger" role="alert">Not enough money!</div>';
                                    } else {

                                        $weapon = $_POST['weap_name'];
                                        $update = mysqli_prepare($connection_world, "UPDATE player SET weapon = '$weapon', money = '$money' WHERE player_name = '$name'");
                                        mysqli_stmt_execute($update);
                                        if ($update) {
                                            echo '<div class="alert alert-success" role="alert">Succes!</div>';
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">Oops! something went wrong!</div>div>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <div class='panel-footer'>Weapon Shop</div>
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