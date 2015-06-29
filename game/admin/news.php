<?php
include ("../../includes/config.php");
include ("../includes/functions.php");
loggedIn($_SESSION['name']);
$world = selectWorldName($connection, 1);
$online = usersOnline($connection_world);
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
                            <li role="presentation" class='active'><a href="news.php">News display</a></li>
                            <li role="presentation"><a href="addNews.php">Add news</a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <th>#</th>
                            <th>Title</th>
                            <th>Creator</th>
                            <th>Upload Date</th>
                            <th>Delete</th>
                            <?php
                            $query = mysqli_query($connection, "SELECT * FROM news ");
                            while ($row = mysqli_fetch_row($query)) {

                                echo '<tr><td>'.$row[0].'</td>';
                                echo '<td>'.$row[1].'</td>';
                                echo '<td>'.$row[3].'</td>';
                                echo '<td>'.$row[4].'</td>';
                                echo '<form method="post"><td><button type="submit" class="btn btn-danger" name="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <input type="hidden" value="'.$row[0].'" name="id"/></td></form></tr> ';

                            }

                            if (isset($_POST['delete'])) {
                                $id = $_POST['id'];
                                $delete = mysqli_prepare($connection, "DELETE FROM news WHERE id = ?");
                                mysqli_stmt_bind_param($delete, "i", $id);
                                mysqli_stmt_execute($delete);
                                if ($delete) {
                                    echo '<div class="alert alert-success" role="alert">Succes! The selected object has been deleted from the database.<span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>';
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Oops! Something went wrong.</div>';
                                }
                            }
                            ?>
                        </table>
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