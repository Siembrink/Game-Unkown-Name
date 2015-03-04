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
                                    <li role="presentation"><a href="account.php">Account Settings</a></li>
                                    <li role="presentation" ><a href="edit-profile.php">Profile</a></li>
                                    <li role="presentation" class='active'><a href="messages.php">Messages</a></li>
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
                                <?php
                                if (isset($_POST['send'])) {
                                    if (empty($_POST['to']) || empty($_POST['subject']) || empty($_POST['message'])) {
                                        echo '<br /><div class="alert alert-danger" role="alert">Oops! Something is going wrong..</div>';
                                    }

                                    $date = date("d/m/Y h:i");
                                    $message = mysqli_real_escape_string($connection_world, $_POST['message']);
                                    $subject = mysqli_real_escape_string($connection_world, $_POST['subject']);
                                    $to = mysqli_real_escape_string($connection_world, $_POST['to']);
                                    $from = $_SESSION['name'];

                                    if (doesPlayerExist($connection_world, $to) == false) {
                                        echo '<div class="alert alert-danger" role="alert">Player does not exist!</div>';
                                    } else if (doesPlayerExist($connection_world, $to) == $_SESSION['name']) {
                                        echo '<div class="alert alert-danger" role="alert">You cannot send a message to yourself!</div>';
                                    } else {

                                        $insert = mysqli_prepare($connection_world, "INSERT INTO `message`(`from`, `to`, `date`, `message`, `subject`) VALUES (?,?,?,?,?)");
                                        mysqli_stmt_bind_param($insert, "sssss", $from, $to, $date, $message, $subject);
                                        mysqli_execute($insert);

                                        if ($insert) {
                                            echo '<div class="alert alert-success" role="alert">Message send!</div>';
                                        } else {
                                            echo '<div class="alert alert-danger" role="alert">Oops! Something is going wrong..</div>';
                                        }
                                    }
                                }
                                ?>
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