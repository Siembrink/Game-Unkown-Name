<?php
include ("../includes/config.php");
include ("includes/functions.php");
include ("includes/exptable.php");
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
                    <div class="panel-heading"><h4>Car stealing</h4></div>
                    <p class="page-header" style="padding: 20 30 20 20px;">
                        Hello and welcome! Here you have the option to steal a car. However be aware, because the police don't like the high crime rate in this town and they will punish you hard.
                    </p>
                    <div class="panel-body">
                        <form method="post" >

                            <div class="col-lg-6" >

                                <div class="input-group" >
                                    <select class="form-control" name="crime">
                                        <option value="1">Steal a car left behind in a random garage.</option>
                                        <option value="2">Steal the car from your best friend.</option>
                                        <option value="3">That old lady! Steal her car!.</option>
                                        <option value="4">Steal the car from a parking lot which has some kind of security.</option>
                                        <option value="5">Steal the car from Chuck Norris.</option>
                                    </select>
                                            <span class="input-group-btn">
                                                <button class="btn btn-info" name="submit" type="submit">Go!</button>
                                            </span>
                                </div><br/>
                        </form>


                    </div>
                    <?php
                    if (isset($_POST['submit'])) {
                        echo "Hello world";

                        $rank = checkRank($connection_world, $_SESSION['name']);
                        $crime1 = "crime1";
                        $cooldown = date('Y-m-d H:i:s', strtotime("+5 min"));
                        $now_time = date("Y-m-d H:i:s");
                        $time = checkCrime($connection_world, $crime1, $_SESSION['name']);
                        $jail = checkJail($connection_world, $_SESSION['name']);
                        if ($now_time < $time || $now_time < $jail) {
                            echo '<br /><br /><div class="alert alert-danger" role="alert">You have to wait 5 minutes untill you can try do a crime again. Or you are still in jail.</div><br />';
                        } else {
                            $crime = mysqli_real_escape_string($connection_world, $_POST['crime']);


                            if ($crime == "1") {
                                echo '<br /><br /><div class="alert alert-info" role="alert">Trying to steal the child his lunch money.. </div><br />';
                                $percent = rand(1, 4);
                                $succes = rand(1, 4);
                                if ($succes < $percent) {
                                    $jail = rand(1, 5);

                                    if ($jail > 2) {
                                        echo '<div class="alert alert-danger" role="alert">There was an officer around the corner and he caught you.. Now you\'re in jail for 5 minutes.<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                        goToJail($connection_world, $cooldown, $_SESSION['name']);
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">There was an officer around the corner but you show them that you can run fast and got away safetly!<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                    }
                                } else {
                                    $money = rand(10, 50);
                                    echo '<div class="alert alert-success" role="alert">Succes! The child had a total of ' . $money . ' as lunch money! Good job.<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>';
                                    $currmoney = currMoney($connection_world, $_SESSION['name']);
                                    $money = $money + $currmoney;
                                    addMoney($connection_world, $money, $_SESSION['name']);
                                    doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                    $progress = expSimpleCrime($connection_world, $rank, $crime, $_SESSION['name']);
                                    addExp($connection_world, $_SESSION['name'], $progress);


                                }
                            } else if ($crime == "2") {
                                echo '<br /><br /><div class="alert alert-info" role="alert">Trying to steal a women her purse.. </div><br />';
                                $percent = rand(1, 5);
                                $succes = rand(1, 5);
                                if ($succes < $percent) {
                                    $jail = rand(1, 5);

                                    if ($jail > 3) {
                                        echo '<div class="alert alert-danger" role="alert">The women was an officer, and she arrested you.<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                        goToJail($connection_world, $cooldown, $_SESSION['name']);
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">Dude.. you got rekt by a women!<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                    }
                                } else {
                                    $money = rand(10, 100);
                                    echo '<div class="alert alert-success" role="alert">Succes! The women had a total amount of ' . $money . ' in her purse. Good job!<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>';
                                    $currmoney = currMoney($connection_world, $_SESSION['name']);
                                    $money = $money + $currmoney;
                                    addMoney($connection_world, $money, $_SESSION['name']);
                                    doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                    $progress = expSimpleCrime($connection_world, $rank, $crime, $_SESSION['name']);
                                    addExp($connection_world, $_SESSION['name'], $progress);
                                }
                            } else if ($crime == "3") {
                                echo '<br /><br /><div class="alert alert-info" role="alert">Trying to rob a local liguor store..</div><br />';
                                $percent = rand(1, 10);
                                $succes = rand(1, 10);
                                if ($succes < $percent) {
                                    $jail = rand(1, 5);

                                    if ($jail > 4) {
                                        echo '<div class="alert alert-danger" role="alert">The police was to quick for you when the alarm got off. Jail time it is.<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                        goToJail($connection_world, $cooldown, $_SESSION['name']);
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">The alarm did go off sadly, but luckily you manage to escape!<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                    }
                                } else {
                                    $money = rand(100, 500);
                                    echo '<div class="alert alert-success" role="alert">Succes! The liguor store had a total amount of ' . $money . ' in the safe! Good job.<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>';
                                    $currmoney = currMoney($connection_world, $_SESSION['name']);
                                    $money = $money + $currmoney;
                                    addMoney($connection_world, $money, $_SESSION['name']);
                                    doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                    $progress = expSimpleCrime($connection_world, $rank, $crime, $_SESSION['name']);
                                    addExp($connection_world, $_SESSION['name'], $progress);
                                }
                            } else if ($crime == "4") {
                                echo '<br /><br /><div class="alert alert-info" role="alert">Trying to steal the furniture from your own neighbour..</div><br />';
                                $percent = rand(1, 20);
                                $succes = rand(1, 20);
                                if ($succes < $percent) {
                                    $jail = rand(1, 5);

                                    if ($jail > 4) {
                                        echo '<div class="alert alert-danger" role="alert">The neighbour was still at home and captured you. He called the police and now you\'re in jail.<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                        goToJail($connection_world, $cooldown, $_SESSION['name']);
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">The nieghbour was sick at home. Lucky for you he didnt saw you!<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                    }
                                } else {
                                    $money = rand(250, 1000);
                                    echo '<div class="alert alert-success" role="alert">Succes! You took the television of the neighbour and sold it for ' . $money . '! Good job.<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>';
                                    $currmoney = currMoney($connection_world, $_SESSION['name']);
                                    $money = $money + $currmoney;
                                    addMoney($connection_world, $money, $_SESSION['name']);
                                    doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                    $progress = expSimpleCrime($connection_world, $rank, $crime, $_SESSION['name']);
                                    addExp($connection_world, $_SESSION['name'], $progress);
                                }
                            } else {
                                echo '<br /><br /><div class="alert alert-info" role="alert">Trying to rob a small bank..</div><br />';
                                $percent = rand(1, 50);
                                $succes = rand(1, 50);
                                if ($succes < $percent) {
                                    $jail = rand(1, 5);

                                    if ($jail > 4) {
                                        echo '<div class="alert alert-danger" role="alert">An officer was guarding the bank, the moment you took out your gun he captured you and now its jail time. Again.<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                        goToJail($connection_world, $cooldown, $_SESSION['name']);
                                    } else {
                                        echo '<div class="alert alert-danger" role="alert">An officer was guarding the bank, the moment you saw him you left the bank. Smart choice.<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                    }
                                } else {
                                    $money = rand(5000, 50000);
                                    echo '<div class="alert alert-success" role="alert">Succes! The bank had a total amount of ' . $money . ' in the safe! Good job.<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>';
                                    $currmoney = currMoney($connection_world, $_SESSION['name']);
                                    $money = $money + $currmoney;
                                    addMoney($connection_world, $money, $_SESSION['name']);
                                    doCrime($connection_world, $crime1, $cooldown, $_SESSION['name']);
                                    $progress = expSimpleCrime($connection_world, $rank, $crime, $_SESSION['name']);
                                    addExp($connection_world, $_SESSION['name'], $progress);
                                }
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
    </html><?php
/**
 * Created by PhpStorm.
 * User: Simon
 * Date: 9/24/2015
 * Time: 9:58 AM
 */