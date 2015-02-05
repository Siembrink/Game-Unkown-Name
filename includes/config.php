<?php

session_start();
$connection = mysqli_connect('localhost', "root", "", "maffia_main");
$connection_world = mysqli_connect('localhost', 'root', '', 'maffia_beta');
