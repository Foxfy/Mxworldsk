<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Create Competition - Thai Football Tournament</title>

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
      <?php
        include_once 'Controllers/alertController.php';
      ?>
      <header class="mb-4 d-flex align-items-center justify-content-between">
        <h3 class="mb-0">Create a competition</h3>
      </header>

      <section class="form">
        <div class="row">
          <div class="col-md-4">
            <form action="./Controllers/addCompetitionController.php" method="POST" enctype="multipart/form-data">
              <div class="col-12">
                <div class="mb-3">
                  <label for="name">Competition Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    value="<?=$_SESSION['post']['name']??''?>"
                    required
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input
                      type="text"
                      class="form-control"
                      id="slug"
                      name="slug"
                      value="<?=$_SESSION['post']['slug']??''?>"
                      required
                    />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="max_teams">Max Teams</label>
                    <input
                      type="number"
                      class="form-control"
                      id="max_teams"
                      name="max_teams"
                      min="2"
                      value="<?=$_SESSION['post']['max_teams']??''?>"
                      required
                    />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="allowed_Provinces">Allowed Provinces</label>
                    <select
                      multiple
                      name="allowed_provinces[]"
                      id="allowed_Provinces"
                      class="form-control"
                      required
                    >
                    <?php 
                      foreach($comps->getAllProv() as $data):
                        if(in_array($data['id'] , $_SESSION['post']['allowed_provinces']??[])) {
                          $selected = 'selected';
                        }else {
                          $selected = '';
                        }
                    ?>
                      <option value="<?=$data['id']?>" <?=$selected?> ><?=$data['name']?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="banner">Banner</label>
                    <?php
                    if(isset($_SESSION['banner'])) {
                    ?>
                    <img src="./upload/<?=$_SESSION['banner']??''?>" width="250px" alt="">
                    <?php
                    }
                    ?>
                    <input
                      type="file"
                      class="form-control"
                      id="banner"
                      name="banner"
                      value=""
                    />
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-8">
                  <button class="btn btn-competition w-100" type="submit">
                    Save
                  </button>
                </div>
                <div class="col-4">
                  <a
                    href="competition-index.php"
                    class="btn btn-outline-competition w-100"
                    type="submit"
                    >Back</a
                  >
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </main>
  </body>
</html>

<?php
unset($_SESSION['post']);
unset($_SESSION['banner']);
?>
