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
                            <div class="panel-heading"><h4>Crime</h4></div>
                            <p class="page-header" style="padding: 20 30 20 20px;">
                                Here you can do a crime against the law. This is the easiest way to earn quick money but be careful there are cops everywhere and if you get busted, you are going to jail. The higher your rank the easier the job is going to be, but the higher your rank is the longer you will stay in jail whenever you get caught.
                            </p>
                            <div class="panel-body">
                                <form method="post" >

                                    <div class="col-lg-6" >

                                        <div class="input-group" >
                                            <select class="form-control" name="crime">
                                                <option value="1">Steal lunch money from a child.</option>
                                                <option value="2">Steal a women her purse.</option>
                                                <option value="3">Rob a local liquor store.</option>
                                                <option value="4">Steal the furniture from your neighbour.</option>
                                                <option value="5">Rob a small bank.</option>
                                            </select>
                                            <span class="input-group-btn">
                                                <button class="btn btn-info" name="submit" type="submit">Go!</button>
                                            </span>
                                        </div><br/>
                                </form>


                            </div>
                            <?php
                            if (isset($_POST['submit'])) {
                                $crime = mysqli_real_escape_string($connection_world, $_POST['crime']);
                                if ($crime = "1") {
                                    echo '<br /><br /><div class="alert alert-info" role="alert">Trying to steal the child his lunch money.. </div><br />';
                                    $percent = rand(1, 100);
                                    $succes = rand(1, 100);
                                    if ($succes < $percent) {
                                        $jail = $succes;

                                        if ($jail > 50) {
                                            echo '<div class="alert alert-danger" role="alert">There was an officer around the corner and he caught you.. Now you\'re in jail for 5 minutes.<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">There was an officer around the corner but you show them that you can run fast and got away safetly!<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>';
                                        }
                                    } else {
                                        $money = rand(10, 50);
                                        echo '<div class="alert alert-success" role="alert">Succes! The child had a total of ' . $money . ' as lunch money! Good job.<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>';
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