<?php
include_once '../DatabaseConFig/connect.php';
include_once '../Models/TeamModels.php';

$comps = new TeamModels($conn);

$competition_slug = $_POST['competition_slug'];
$team_id = $_POST['team_id'];


try {
    $result = $comps->joinTeam($competition_slug, $team_id);

 

    // team is not allowed 
    if($result == "team is not allowed"){
        $_SESSION['alert']['message'] = "team is not allowed .";
        $_SESSION['alert']['css'] = "alert-danger text-center";
        header('location:../join-competition.php?competition_slug='.$competition_slug);
        exit();
    }

    // team aleady full
    if($result == "team aleady full"){
        $_SESSION['alert']['message'] = "team aleady full.";
        $_SESSION['alert']['css'] = "alert-danger text-center";
        header('location:../join-competition.php?competition_slug='.$competition_slug);
        exit();
    }

    // team aleady join
    if($result == "team aleady join"){
        $_SESSION['alert']['message'] = "team aleady join.";
        $_SESSION['alert']['css'] = "alert-danger text-center";
        header('location:../join-competition.php?competition_slug='.$competition_slug);
        exit();
    }

    // if success
    if($result){
        $_SESSION['alert']['message'] = "Join team successfully.";
        $_SESSION['alert']['css'] = "alert-success text-center";
        header('location:../competition-detail.php?competition_slug='.$result);
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    
  
}

catch(Exception $e) {
    $_SESSION['alert']['message'] = "Join team failed.";
    $_SESSION['alert']['css'] = "alert-danger text-center";
    header('location:../join-competition.php?competition_slug='.$result);
}


?>