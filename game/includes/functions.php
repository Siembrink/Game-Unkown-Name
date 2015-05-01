<?php

function selectWorldName($connection, $id) {
    $select = mysqli_prepare($connection, "SELECT world_name, world_start, world_end FROM world WHERE world_id = ?");
    mysqli_stmt_bind_param($select, "i", $id);
    mysqli_stmt_execute($select);
    mysqli_stmt_bind_result($select, $name, $start, $end);
    mysqli_stmt_fetch($select);
    return array($name, $start, $end);
}

function selectWebRank($connection, $username) {
    $select = mysqli_prepare($connection, "SELECT webrank FROM user WHERE username = ?");
    mysqli_stmt_bind_param($select, "s", $username);
    mysqli_stmt_execute($select);
    mysqli_stmt_bind_result($select, $rank);
    mysqli_stmt_fetch($select);
    return $rank;
}

function selectPlayer($connection, $username) {
    $select = mysqli_prepare($connection, "SELECT player_name, rank, progress, family, money, banned, avatar, profile_text FROM player WHERE player_name = ?");
    mysqli_stmt_bind_param($select, "s", $username);
    mysqli_stmt_execute($select);
    mysqli_stmt_bind_result($select, $username, $rank, $progress, $family, $money, $ban, $avatar, $text);
    mysqli_stmt_fetch($select);
    return array($username, $rank, $progress, $family, $money, $ban, $avatar, $text);
}

function doesPlayerExist($connection, $username) {
    $sql = "SELECT * FROM player WHERE player_name = '$username'";
    $query = mysqli_query($connection, $sql);
    if (mysqli_num_rows($query) > 0) {
        return true;
    } else {
        return false;
    }
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
    mysqli_stmt_execute($select);
    mysqli_stmt_bind_result($select, $online1);
    mysqli_stmt_fetch($select);
    if ($online1 == 0) {
        return '<span class="label label-danger">Offline</span>';
    } else {
        return '<span class="label label-success">Online</span>';
    }

}

function usersOnline($connection) {
    $number = 1;
    $select = mysqli_prepare($connection, "SELECT count(online) FROM player WHERE online = ?");
    mysqli_stmt_bind_param($select, "i", $number);
    mysqli_stmt_execute($select);
    mysqli_stmt_bind_result($select, $online);
    mysqli_stmt_fetch($select);
    return $online;
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

function goToJail($connection, $time, $name) {
    $update = mysqli_prepare($connection, "UPDATE player SET jail = ? WHERE `player_name` = ?");
    mysqli_stmt_bind_param($update, "ss", $time, $name);
    mysqli_stmt_execute($update);
}

function checkJail($connection, $name) {
    $connection = mysqli_connect('localhost', 'root', '', 'maffia_beta');
    $select = mysqli_prepare($connection, "SELECT jail FROM `player` WHERE `player_name` = ?");
    mysqli_stmt_bind_param($select, "s", $name);
    mysqli_stmt_execute($select);
    mysqli_stmt_bind_result($select, $time2);
    mysqli_stmt_fetch($select);
    return $time2;
}

function checkCrime($connection, $crime, $name) {
    $select = mysqli_prepare($connection, "SELECT crime1 FROM `player` WHERE player_name = ?");
    mysqli_stmt_bind_param($select, "s", $name);
    mysqli_stmt_execute($select);
    mysqli_stmt_bind_result($select, $time2);
    mysqli_stmt_fetch($select);
    return $time2;
}

function doCrime($connection, $crime, $time, $name) {
    if ($crime = "crime1") {
        $update = mysqli_prepare($connection, "UPDATE player SET crime1 = ? WHERE `player_name` = ?");
        mysqli_stmt_bind_param($update, "ss", $time, $name);
        mysqli_stmt_execute($update);
    } else if ($crime = "crime2") {

    }
}

function checkUserCrime($connection, $crime) {
    // check if user can do the crime again
    // Normal Crime : wait 2 min
    // Org. Crime : wait 15 min
    // Car stealing : wait 5 min
    // Bank Rob : wait 30 min
}

function currMoney($connection, $name) {
    $select = mysqli_prepare($connection, "SELECT `money` FROM `player` WHERE `player_name` = ?");
    mysqli_stmt_bind_param($select, "s", $name);
    mysqli_stmt_execute($select);
    mysqli_stmt_bind_result($select, $money_data);
    mysqli_stmt_fetch($select);
    return $money_data;
}

function addMoney($connection, $money, $name) {
    $update = mysqli_prepare($connection, "UPDATE player SET money = ? WHERE player_name = ?");
    mysqli_stmt_bind_param($update, "is", $money, $name);
    mysqli_stmt_execute($update);
}

function checkFamily($connection, $username) {
    $connection = mysqli_connect('localhost', 'root', '', 'maffia_beta');
    $check = mysqli_prepare($connection, "SELECT family FROM player WHERE player_name = ?");
    mysqli_stmt_bind_param($check, "s", $username);
    mysqli_stmt_execute($check);
    mysqli_stmt_bind_result($check, $family);
    mysqli_stmt_fetch($check);
    if ($family == "None") {
        return false;
    } else {
        return true;
    }
}


