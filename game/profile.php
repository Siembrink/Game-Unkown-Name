<?php
include ("../includes/config.php");
include ("includes/functions.php");
loggedIn($_SESSION['name']);
if (!isset($_GET['profile'])) {
    header("Location: members.php");
}

$character = selectPlayer($connection_world, $_GET['profile-name']);
$online = isUserOnline($connection_world, $_GET['profile-name']);
echo $online;

$money = setUserWealth($character[4]);
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
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo $character[0]; ?>'s profile</h3>
                            </div>

                            <div class="panel-body">
                                <div class="col-sm-3">
                                    <img src="<?php echo $character[6]; ?>" alt="Maffia Avatar" align="left" width="200px"/>
                                </div>
                                <div class="col-sm-9">


                                    <table class="table">
                                        <tr>
                                            <td>Name :</td>
                                            <td><?php echo $character[0]; ?></td>
                                            <td>Status :</td>
                                            <td><?php echo $online; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Rank :</td>
                                            <td><?php echo $character[1]; ?></td>
                                            <td>Money Rank :</td>
                                            <td><?php echo $money; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Progress</td>
                                            <td><?php echo $character[2]; ?>%</td>
                                            <td>Family :</td>
                                            <td><?php echo $character[3]; ?></td>
                                        </tr>

                                    </table>

                                </div>
                                <div class="col-sm-12">
                                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate ex vitae cursus commodo. Fusce non augue sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce molestie varius diam, ut pellentesque nibh feugiat hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed maximus vestibulum turpis, et commodo purus fermentum vitae. Proin facilisis nunc et tortor mattis commodo. Aenean rutrum sollicitudin sodales. Fusce feugiat massa diam, eu tristique ipsum tristique eu. Duis vestibulum nibh elementum odio efficitur semper. In ultricies auctor mi, a eleifend purus scelerisque sed. Nulla rhoncus risus tortor, fermentum luctus tortor pretium sit amet.Aliquam tempor tincidunt rutrum. Proin dictum tempor odio eu lobortis. Etiam porta est eu pulvinar dictum. Cras fringilla molestie lorem, sit amet imperdiet tortor
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate ex vitae cursus commodo. Fusce non augue sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce molestie varius diam, ut pellentesque nibh feugiat hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed maximus vestibulum turpis, et commodo purus fermentum vitae. Proin facilisis nunc et tortor mattis commodo. Aenean rutrum sollicitudin sodales. Fusce feugiat massa diam, eu tristique ipsum tristique eu. Duis vestibulum nibh elementum odio efficitur semper. In ultricies auctor mi, a eleifend purus scelerisque sed. Nulla rhoncus risus tortor, fermentum luctus tortor pretium sit amet.Aliquam tempor tincidunt rutrum. Proin dictum tempor odio eu lobortis. Etiam porta est eu pulvinar dictum. Cras fringilla molestie lorem, sit amet imperdiet tortor
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate ex vitae cursus commodo. Fusce non augue sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce molestie varius diam, ut pellentesque nibh feugiat hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed maximus vestibulum turpis, et commodo purus fermentum vitae. Proin facilisis nunc et tortor mattis commodo. Aenean rutrum sollicitudin sodales. Fusce feugiat massa diam, eu tristique ipsum tristique eu. Duis vestibulum nibh elementum odio efficitur semper. In ultricies auctor mi, a eleifend purus scelerisque sed. Nulla rhoncus risus tortor, fermentum luctus tortor pretium sit amet.Aliquam tempor tincidunt rutrum. Proin dictum tempor odio eu lobortis. Etiam porta est eu pulvinar dictum. Cras fringilla molestie lorem, sit amet imperdiet tortor
                                    </p>
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