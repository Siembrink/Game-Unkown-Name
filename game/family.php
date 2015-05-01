<?php
include ("../includes/config.php");
include ("includes/functions.php");
loggedIn($_SESSION['name']);
$world = selectWorldName($connection, 1);
$online = usersOnline($connection_world);
if (checkFamily($connection_world, $_SESSION['name']) == true) {
    header("Location: index.php");
}
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
                    <div class="panel-heading"><h4>Create a Family</h4></div>
                    <p class="page-header" style="padding: 20 30 20 20px;">
                       Hello and welcome. Here you can create your very own family! In the world we life fighting alone is worse then fighting together so why dont you create a family and be the biggest family in the world and dominate the rest.
                     <br/><br/>   However there are some requirements before you can create your very own family. You need to be atleast the rank <strong>godfather</strong> and have two people willing to join the family instant.
                    </p>
                    <div class="panel-body">
                        <form method="post">
                            <label>Fam. Name: </label><br />
                            <input type="text" class="form-control-static" name="family-name" /><br />
                            <label>Player 1: </label> <br />
                            <input type="text" class="form-control-static" name="player1-name" /> <br />
                            <label>Player 2: </label> <br />
                            <input type="text" class="form-control-static" name="player2-name" /> <br />
                            <label>Player 3: </label> <br />
                            <input type="text" class="form-control-static" name="player3-name" /><br />
                            <br/><input type="submit" class="btn btn-info" value="Create Family" name="create"/>
                        </form>

                        <?php
                            echo '<div class="alert alert-danger" role="danger">Hallo wereld</div>';
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