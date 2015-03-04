<?php
$character = selectPlayer($connection_world, $_SESSION['name']);


$money = setUserWealth($character[4]);
?><html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <div class="col-sm-3 col-md-3 sidebar">

            <?php
            $name = $_SESSION['name'];
            $read = 0;
            $select = mysqli_prepare($connection_world, "SELECT count(`read`) FROM `message` WHERE `to` = ? AND `read` = ?");
            mysqli_stmt_bind_param($select, "si", $name, $read);
            mysqli_execute($select);
            mysqli_stmt_bind_result($select, $message);
            mysqli_stmt_fetch($select);
            if ($message > 0) {
                echo '<div class="alert alert-info" role="alert">You have a new message! <a href="messages.php">Check it now!</a></div>';
            }
            ?>

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        <h3 class="panel-title">Character Information</h3>
                    </a>
                </div>
                <div id="collapse5" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading5">
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
            </div>

            <?php
            $rank = selectWebRank($connection, $_SESSION['name']);
            if ($rank == 5) {
                echo '<div class="panel panel-default">';
                echo '<div class="panel-heading">';
                echo '<a data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6"><h3 class="panel-title">Admin</h3></a></div>';
                echo '<div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">';
                echo '<div class="panel-body">';
                echo '<ul class="nav nav-sidebar">';
                echo '<ul class="nav nav-pills nav-stacked">';
                echo '<li><a href="/maffia/game/admin/index.php">Admin panel</a></li>';
                echo '</ul></ul></div></div></div>';
            }
            ?>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    Unkown-game by Siembrink  	&copy; 2015
                </div>
            </div>
        </div>
    </body>
</html>
