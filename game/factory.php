<?php
include ("../includes/config.php");
include ("includes/functions.php");
loggedIn($_SESSION['name']);
$world = selectWorldName($connection, 1);
$currMoney = currMoney($connection_world, $_SESSION['name']);
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
                                <div class='col-sm-3 col-md-8'>
                                    <form method="post">
                                        <label>How many bullets? </label>
                                        <input type="text" class="form-control-info" name="value" />
                                        <input type="submit" class="btn btn-info" name="buy" value="Buy"/>

                                    </form>
                                    <?php
                                    $factory = mysqli_prepare($connection_world, "SELECT * FROM factory");
                                    mysqli_stmt_execute($factory);
                                    mysqli_stmt_bind_result($factory, $id_fac, $bullets, $cost, $sold);
                                    mysqli_stmt_fetch($factory);


                                    ?>
                                </div>
                                <div class='col-sm-3 col-md-4'>
                                    <div class='panel panel-info'>
                                        <div class='panel-heading'>Statistics</div>
                                        <div class='panel-body'>
                                            <table class="table">
                                                <tr>
                                                    <td>Cost:</td>
                                                    <td><?php echo $cost; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Bullets:</td>
                                                    <td><?php echo $bullets; $total_bullets = $bullets; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sold:</td>
                                                    <td><?php echo $sold; mysqli_stmt_reset($factory);?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>


                                </div>
                                <?php
                                if (isset($_POST['buy'])) {
                                    $value = $_POST['value'];
                                    $name = $_SESSION['name'];


                                    $total_cost = $value * $cost;
                                    if ($total_cost > $currMoney) {
                                        echo '<div class="alert alert-danger" role="alert">Not enough money!</div>';
                                    } else if ($total_bullets < $value) {
                                        echo '<div class="alert alert-danger" role="alert">Not enough bullets!</div>';
                                    } else {
                                        $currMoney = $currMoney - $total_cost;
                                        $update = mysqli_prepare($connection_world, "UPDATE player SET money='$currMoney'");
                                        mysqli_stmt_execute($update);
                                        if ($update) {

                                            mysqli_stmt_reset($update);
                                            $sold = $sold + $value;
                                            $total_bullets = $total_bullets - $value;
                                            $update_factory = mysqli_prepare($connection_world, "UPDATE factory SET bullets = '$total_bullets', sold = '$sold' ");
                                            mysqli_stmt_execute($update_factory);
                                            if ($update_factory) {
                                                echo '<div class="alert alert-success" role="alert">Factory updated</div>';

                                            }
                                        } else{
                                            echo '<div class="alert alert-danger" role="alert">Oops! something went wrong!</div>';
                                        }


                                    }
                                }
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