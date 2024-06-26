<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8" />
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Overview Competition - Thai Football Tournament</title>

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
      $data = $comps->getCompSlug();
    ?>

  <main class="container py-5">
      <?php
        include_once 'Controllers/alertController.php';
      ?>
    <section class="mb-4 d-flex align-items-center justify-content-between">
      <header>
        <h3><?=$data[0]['name']?></h3>
        <div class="d-flex gap-3">
            <a class="btn btn-competition" href="join-competition.php?competition_slug=<?=$_GET['competition_slug']?>">Join a competition</a>
          </div>
      </header>
       
    </section>

    <img src="./upload/<?=$data[0]['banner']?>" width="100%" alt="">

    <section class="my-5">
      <header class="text-center mb-3">
        <h5>Competition Info</h5>
      </header>
      <div class="row justify-content-center">
        <div class="col-md-3 col-sm-6">
          <div class="card">
            <div class="card-body text-center py-3">
              <h1><?=$data[0]['max_teams']?></h1>
              <p class="text-muted mb-0">Max Teams</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card">
            <div class="card-body text-center py-3">
              <h1><?=$data[0]['count_province']?></h1>
              <p class="text-muted mb-0">Provinces</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="my-5">
      <header class="text-center">
        <h5>Participated Provinces</h5>
      </header>
      <div class="row justify-content-center">
        <?php
        $CompId = $data[0]['id'];
        foreach($comps->getCompId($CompId) as $Prov):
        ?>
        <div class="col-md-2 col-sm-6 mt-3">
          <div class="card">
            <div class="card-body text-center py-3">
              <span class="text-muted"><?=$Prov['name']?></span>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </section>

     
  </main>
</body>

</html>