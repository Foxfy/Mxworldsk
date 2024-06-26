<?php
include_once '../DatabaseConFig/connect.php';
include_once '../Models/CompetitionModels.php';

$comps = new CompetitionModels($conn);

$team_name = $_POST['team_name'];
$team_province = $_POST['team_province'];
$team_logo = $_FILES['team_logo']['name'];
copy($_FILES['team_logo']['tmp_name'] , '../upload/'.$team_logo);

try {
    $comps->addTeam($team_name, $team_province, $team_logo);

    $_SESSION['alert']['message'] = "Create team successfully.";
    $_SESSION['alert']['css'] = "alert-success text-center";
    header('location:../competition-index.php');
}

catch(Exception $e) {
    $_SESSION['alert']['message'] = "Create team failed.";
    $_SESSION['alert']['css'] = "alert-danger text-center";
    header('location:../competition-create-team.php');
}


?>