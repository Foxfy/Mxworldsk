<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Competition | Create team</title>

    <script type="module" crossorigin src="./assets/compiled/js/bootstrap.esm.js"></script>
    <link rel="stylesheet" href="./assets/compiled/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/compiled/css/style.css" />
</head>
<body>
    <?php
      include_once 'DatabaseConFig/connect.php';
      include_once 'Models/TeamModels.php';
      include_once 'layout/navbar.php';

      $comps = new TeamModels($conn);
    ?>
    <div class="h-screen">
        <div class="container">
        <?php
            include_once 'Controllers/alertController.php';
        ?>
            <div class="form-center">
       
                <form action="Controllers/joinTeamController.php" method="post" class="form-space" enctype="multipart/form-data">
                <?php
        include_once 'Controllers/alertController.php';
      ?>    
                <div class="row">
                        <h1>Join team <?=$_GET['competition_slug']?></h1>
                        <div class="col">
                            <input type="hidden" name="competition_slug" value="<?=$_GET['competition_slug']?>">
                            <label for="team">Choose Team</label>
                            <select name="team_id" class="form-control mb-2" required>
                                <?php 
                                foreach($comps->getAllTeams() as $data):
                                ?>
                                <option value="<?=$data['id']?>"><?=$data['team_name']?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="d-flex gap-3 mt-5">
                                <button type="submit" class="btn btn-competition w-100">Join</button>
                                <a href="competition-detail.php?competition_slug=<?=$_GET['competition_slug']?>" class="btn btn-outline-competition w-50">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>