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
                            <div class="panel-heading"><h4>The story</h4></div>
                            <div class="panel-body">
                                <img src="images/maffia_avatar.jpg" alt="Maffia Avatar" align="left" width="200px"/>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate ex vitae cursus commodo. Fusce non augue sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce molestie varius diam, ut pellentesque nibh feugiat hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed maximus vestibulum turpis, et commodo purus fermentum vitae. Proin facilisis nunc et tortor mattis commodo. Aenean rutrum sollicitudin sodales. Fusce feugiat massa diam, eu tristique ipsum tristique eu. Duis vestibulum nibh elementum odio efficitur semper. In ultricies auctor mi, a eleifend purus scelerisque sed. Nulla rhoncus risus tortor, fermentum luctus tortor pretium sit amet.Aliquam tempor tincidunt rutrum. Proin dictum tempor odio eu lobortis. Etiam porta est eu pulvinar dictum. Cras fringilla molestie lorem, sit amet imperdiet tortor
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate ex vitae cursus commodo. Fusce non augue sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce molestie varius diam, ut pellentesque nibh feugiat hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed maximus vestibulum turpis, et commodo purus fermentum vitae. Proin facilisis nunc et tortor mattis commodo. Aenean rutrum sollicitudin sodales. Fusce feugiat massa diam, eu tristique ipsum tristique eu. Duis vestibulum nibh elementum odio efficitur semper. In ultricies auctor mi, a eleifend purus scelerisque sed. Nulla rhoncus risus tortor, fermentum luctus tortor pretium sit amet.Aliquam tempor tincidunt rutrum. Proin dictum tempor odio eu lobortis. Etiam porta est eu pulvinar dictum. Cras fringilla molestie lorem, sit amet imperdiet tortor
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate ex vitae cursus commodo. Fusce non augue sem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce molestie varius diam, ut pellentesque nibh feugiat hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed maximus vestibulum turpis, et commodo purus fermentum vitae. Proin facilisis nunc et tortor mattis commodo. Aenean rutrum sollicitudin sodales. Fusce feugiat massa diam, eu tristique ipsum tristique eu. Duis vestibulum nibh elementum odio efficitur semper. In ultricies auctor mi, a eleifend purus scelerisque sed. Nulla rhoncus risus tortor, fermentum luctus tortor pretium sit amet.Aliquam tempor tincidunt rutrum. Proin dictum tempor odio eu lobortis. Etiam porta est eu pulvinar dictum. Cras fringilla molestie lorem, sit amet imperdiet tortor
                                </p>
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