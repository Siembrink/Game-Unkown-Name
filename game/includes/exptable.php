<?php
function expSimpleCrime($connection, $rank, $crime, $username) {
    if ($crime == "1") {
        if ($rank == 1) {$progress = 10;}
        else if ($rank == 2) {$progress = 8;}
        else if ($rank == 3) { $progress = 6;}
        else if ($rank == 4) { $progress = 5;}
        else if ($rank == 5) { $progress = 2;}
        else if ($rank == 6) { $progress = 0.5;}
        else { $progress = 0;}
    } else if ($crime == "2") {
        if ($rank == 1) {$progress = 15;}
        else if ($rank == 2) {$progress = 10;}
        else if ($rank == 3) { $progress = 8;}
        else if ($rank == 4) { $progress = 5;}
        else if ($rank == 5) { $progress = 3;}
        else if ($rank == 6) { $progress = 0.75;}
        else { $progress = 0;}
    } else if ($crime == "3") {
        if ($rank == 1) {$progress = 17.5;}
        else if ($rank == 2) {$progress = 11;}
        else if ($rank == 3) { $progress = 9;}
        else if ($rank == 4) { $progress = 7;}
        else if ($rank == 5) { $progress = 4;}
        else if ($rank == 6) { $progress = 1.2;}
        else { $progress = 0;}
    } else if ($crime == "4") {
        if ($rank == 1) {$progress = 20;}
        else if ($rank == 2) {$progress = 15;}
        else if ($rank == 3) { $progress = 12;}
        else if ($rank == 4) { $progress = 8;}
        else if ($rank == 5) { $progress = 4;}
        else if ($rank == 6) { $progress = 1.2;}
        else { $progress = 0;}
    } else {
        if ($rank == 1) {$progress = 22;}
        else if ($rank == 2) {$progress = 17;}
        else if ($rank == 3) { $progress = 15;}
        else if ($rank == 4) { $progress = 13;}
        else if ($rank == 5) { $progress = 10;}
        else if ($rank == 6) { $progress = 2;}
        else { $progress = 0;}
    }

    $checkprogress = mysqli_prepare($connection, "SELECT progress FROM player WHERE player_name = ?");
    mysqli_stmt_bind_param($checkprogress, "s", $username);
    mysqli_stmt_execute($checkprogress);
    mysqli_stmt_bind_result($checkprogress, $currentprogress);
    mysqli_stmt_fetch($checkprogress);

    $progress = $currentprogress + $progress;
    if ($progress >= 100) {
        //rank up!
        $progress = $progress - 100;
    }
   return $progress;
}
function addExp ($connection, $username, $exp) {
    $addExp = mysqli_prepare($connection, "UPDATE player SET progress = ? WHERE player_name = ?");
    mysqli_stmt_bind_param($addExp, "ss", $exp, $username);
    mysqli_stmt_execute($addExp);
    if ($addExp) {
        return "Succes";
    } else {
        return "False";
    }

}