<?php
include ("../../includes/config.php");
include ("../includes/functions.php");
loggedIn($_SESSION['name']);
$world = selectWorldName($connection, 1);
$online = usersOnline($connection_world);
$now_time = date("Y-m-d H:i:s");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Game</title>

    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/npm.js"></script>

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
            include("../layout/navside.php");
            ?>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" ><a href="news.php">News display</a></li>
                            <li role="presentation" class='active'><a href="addNews.php">Add news</a></li>
                        </ul>
                    </div>
                    <div class="panel-body" >
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-1 control-label">Title</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-1 control-label">Creator</label>
                                <div class="col-sm-8">
                                    <?php echo '<input type="text" class="form-control" disabled="true" name="creator" value="'.$_SESSION['name'].'">'; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-1 control-label">Date</label>
                                <div class="col-sm-8">
                                    <?php echo '<input type="text" class="form-control" disabled="true" name="date" value="'.$now_time.'">'; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputOpmerking" class="col-sm-1 control-label">News</label>
                                <div class="col-sm-8">
                                <textarea class="form-control" id="inputNews" name="news" placeholder="News here.."></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-1 control-label"></label>
                                <input type="reset" class="btn btn-danger" />
                                <input type="submit" class="btn btn-primary" name="submit" />
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['submit'])) {
                            if (($_POST['title']) != "" && $_POST['news'] !="") {
                                $insert = mysqli_prepare($connection, "INSERT INTO `news`(`title`, `message`, `creator`, `upload_date`) VALUES (?,?,?,?)");
                                mysqli_stmt_bind_param($insert,"ssss", $_POST['title'], $_POST['news'], $_SESSION['name'], $now_time);
                                mysqli_stmt_execute($insert);
                                if ($insert) {
                                    echo '<div class="alert alert-success" role="alert">Succes! A news item has been added to the system.<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>';
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Oops! Something went wrong.</div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger" role="alert">Oops! Something went wrong.</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            include ("../layout/navright.php");
            ?>

        </div>
    </div>
</div>
</body>
</html>