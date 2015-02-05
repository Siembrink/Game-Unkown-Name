<?php
$character = selectPlayer($connection_world, $_SESSION['name']);

$world = selectWorldName($connection, 1);
$money = setUserWealth($character[4]);
?><html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <div class="col-sm-3 col-md-3 sidebar">


            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">World information</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>World name :</td>
                            <td><?php echo $world[0]; ?></td>
                        </tr>
                        <tr>
                            <td>Round start</td>
                            <td><?php echo $world[1]; ?></td>
                        </tr>
                        <tr>
                            <td>Round end</td>
                            <td><?php echo $world[2]; ?></td>
                        </tr>
                        <tr>
                            <td>Players online</td>
                            <td>300</td>
                        </tr>
                    </table>

                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Character Information</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>Character name :</td>
                            <td><?php echo $character[0]; ?></td>
                        </tr>
                        <tr>
                            <td>Character rank :</td>
                            <td><?php echo $character[1]; ?></td>
                        </tr>
                        <tr>
                            <td>Progress :</td>
                            <td><?php echo $character[2]; ?>%</td>
                        </tr>
                        <tr>
                            <td>Money rank :</td>
                            <td><?php echo $money; ?></td>
                        </tr>
                        <tr>
                            <td>Money :</td>
                            <td>&euro; <?php echo $character[4]; ?></td>
                        </tr>
                        <tr>
                            <td>Family :</td>
                            <td><?php echo $character[3]; ?></td>
                        </tr>
                        <tr>
                        <form method="GET" action="profile.php">
                            <?php echo'<input type="hidden" name="profile-name" value="' . $character[0] . '">'; ?>
                            <td> <input type="submit" class="btn btn-primary" name="profile" value="Profile" /> </td>
                        </form>
                        <form method="POST" action="account.php">
                            <td> <input type="submit" class="btn btn-primary" name="account" value="Manage account" /> </td>
                        </form>
                        </tr>
                    </table>

                </div>
            </div>
            <?php
            $rank = selectWebRank($connection, $_SESSION['name']);
            if ($rank == 5) {
                echo '<div class="panel panel-default">';
                echo '<div class="panel-heading">';
                echo '<h3 class="panel-title">Admin</h3></div>';
                echo '<div class="panel-body">';
                echo '<ul class="nav nav-sidebar">';
                echo '<ul class="nav nav-pills nav-stacked">';
                echo '<li><a href="#">Admin panel</a></li>';
                echo '</ul></ul></div></div>';
            }
            ?>
        </div>
    </body>
</html>
