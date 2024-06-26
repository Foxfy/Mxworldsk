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
      include_once 'Models/CompetitionModels.php';
      include_once 'layout/navbar.php';

      $comps = new CompetitionModels($conn);
    ?>
    <div class="h-screen">
        <div class="container">
        <?php
            include_once 'Controllers/alertController.php';
        ?>
            <div class="form-center">
                <form action="Controllers/addTeamController.php" method="post" class="form-space" enctype="multipart/form-data">
                    <div class="row">
                        <h1>Create team</h1>
                        <div class="col">
                            <label for="team_name">Team Name</label>
                            <input type="text" name="team_name" class="form-control mb-2" required>
                            <label for="team_province">Team Province</label>
                            <select name="team_province" class="form-control mb-2" required>
                                <?php 
                                foreach($comps->getAllProv() as $data):
                                ?>
                                <option value="<?=$data['id']?>"><?=$data['name']?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="team_logo">Team Logo</label>
                            <input type="file" name="team_logo" class="form-control mb-2" required>
                            <div class="d-flex gap-3 mt-5">
                                <button type="submit" class="btn btn-competition w-100">Create</button>
                                <a href="competition-index.php" class="btn btn-outline-competition w-50">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>