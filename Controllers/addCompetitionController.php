<?php
include_once '../DatabaseConFig/connect.php';
include_once '../Models/CompetitionModels.php';

$comps = new CompetitionModels($conn);

if(empty($_POST)) {
    header('location:../competition-create.php');
}

$name = $_POST['name'];
$slug = $_POST['slug'];
$max_teams = $_POST['max_teams'];
$banner = $_FILES['banner']['name'];

try {
    $comps->addComps($name, $slug, $max_teams, $banner);

    $CompId = mysqli_insert_id($conn);
    foreach($_POST['allowed_provinces'] as $ProvId) {
        $comps->addAllowedProv($CompId, $ProvId);
    }

    $_SESSION['alert']['message'] = "Competition create successfully.";
    $_SESSION['alert']['css'] = "alert-success text-center";
    header('location:../competition-detail.php?competition_slug='.$slug);
}

catch(Exception $e) {
    $_SESSION['alert']['message'] = "This slug been uesd.";
    $_SESSION['alert']['css'] = "alert-danger text-center";
    header('location:../competition-create.php');

    $_SESSION['post'] = $_POST;
    $_SESSION['banner'] = $banner;
}

if(!empty($banner)) {
    copy($_FILES['banner']['tmp_name'] , '../upload/'.$banner);
}else {
    $banner = '';
}
?>