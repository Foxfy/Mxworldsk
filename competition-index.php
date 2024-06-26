<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>List Competitions - Thai Football Tournament</title>

    <script
      type="module"
      crossorigin
      src="./assets/compiled/js/bootstrap.esm.js"
    ></script>
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

    <main class="container py-5">
    <?php include_once 'Controllers/alertController.php'; ?>
      <header class="mb-4 d-flex align-items-center justify-content-between">
        <h3 class="mb-0">Competition List</h3>
        <?php
        if(isset($_SESSION['user'])) {
        ?>
          <div class="d-flex gap-3">
            <a class="btn btn-outline-competition" href="competition-create-team.php">Create a Team</a>
            <a class="btn btn-competition" href="competition-create.php">Create a competition</a>
          </div>
        <?php
        }
        ?>
      </header>

      <section class="competition-list">
        <?php
          foreach($comps->getCompsList() as $data):
        ?>
        <a href="competition-detail.php?competition_slug=<?=$data['slug']?>">
          <article class="competition-box card competition-card mb-3">
            <div class="card-body">
              <h4><?=$data['name']?></h4>
              <p class="text-muted mb-0"><?=$data['max_teams']?> Teams - <?=$data['count_province']?> Provinces</p>
            </div>
          </article>
        </a>
        <?php endforeach; ?>
      </section>
    </main>
  </body>
</html>
