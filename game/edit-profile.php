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
                            <div class="panel-heading">

                                <ul class="nav nav-pills" role="tablist">
                                    <li role="presentation"><a href="account.php">Account Settings</a></li>
                                    <li role="presentation" class='active'><a href="edit-profile.php">Profile</a></li>
                                    <li role="presentation"><a href="messages.php">Messages</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <form method="post">
                                    <label>To :</label> <input class="form-control" type="text" maxlength="15" name="to"/><br />
                                    <label>Subject :</label> <input class="form-control" type='text' maxlength='15' name='subject'/><br />
                                    <label>Message :</label> <textarea class="form-control" name="message" /> </textarea><br />
                                    <input class='btn btn-primary' type="submit" name="send" value="Send" />
                                    <input class='btn btn-danger' type="reset" value="Reset" /> <br />
                                </form>
                            </div>
                            <div class='panel-footer'>Account Management</div>
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