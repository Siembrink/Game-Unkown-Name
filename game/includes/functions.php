<?php

function selectWorldName($connection, $id) {
    $select = mysqli_prepare($connection, "SELECT world_name, world_start, world_end FROM world WHERE world_id = ?");
    mysqli_stmt_bind_param($select, "i", $id);
    mysqli_execute($select);
    mysqli_stmt_bind_result($select, $name, $start, $end);
    mysqli_stmt_fetch($select);
    return array($name, $start, $end);
}

function selectWebRank($connection, $username) {
    $select = mysqli_prepare($connection, "SELECT webrank FROM user WHERE username = ?");
    mysqli_stmt_bind_param($select, "s", $username);
    mysqli_execute($select);
    mysqli_stmt_bind_result($select, $rank);
    mysqli_stmt_fetch($select);
    return $rank;
}

function selectPlayer($connection, $username) {
    $select = mysqli_prepare($connection, "SELECT player_name, rank, progress, family, money, banned, avatar FROM player WHERE player_name = ?");
    mysqli_stmt_bind_param($select, "s", $username);
    mysqli_execute($select);
    mysqli_stmt_bind_result($select, $username, $rank, $progress, $family, $money, $ban, $avatar);
    mysqli_stmt_fetch($select);
    return array($username, $rank, $progress, $family, $money, $ban, $avatar);
}

function loggedIn($username) {
    if ($username == "") {
        header("/maffia/index.php");
    }
}

function isUserOnline($connection, $username) {
    $connection = mysqli_connect('localhost', 'root', '', 'maffia_beta');
    $select = mysqli_prepare($connection, "SELECT online FROM player WHERE player_name = ?");
    mysqli_stmt_bind_param($select, "s", $username);
    mysqli_execute($select);
    mysqli_stmt_bind_result($select, $online);
    mysqli_stmt_fetch($select);
    if ($online = 0) {
        return '<span class="label label-danger">Offline</span>';
    } else {
        return '<span class="label label-success">Online</span>';
    }
}

function setUserWealth($money) {
    if ($money <= 50000) {
        return "Poor";
    } else if ($money > 50000) {
        return "Normal";
    } else if ($money > 100000) {
        return "Above normal";
    } else if ($money > 500000) {
        return "Rich";
    } else if ($money > 5000000) {
        return "Very Rich";
    } else if ($money > 50000000) {
        return "Extremly Rich";
    }
}
