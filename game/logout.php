<?php
include ("../includes/config.php");
$name = $_SESSION['name'];
$update = "UPDATE player SET online = 0 WHERE player_name = '$name'";
mysqli_query($connection_world, $update);
session_destroy();
header('location: /maffia/index.php');
exit();
