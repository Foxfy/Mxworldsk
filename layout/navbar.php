<nav class="navbar navbar-expand-lg navbar-dark navbar-bg">
    <div class="container">
        <div class="logo">
            <a class="navbar-brand" href="competition-index.php"
                ><img src="./assets/compiled/logo/logo-01.png" width="60px" class="me-2" alt=""> Football competition</a
            >
        </div>
        <?php
        if(isset($_SESSION['user'])) {
        ?>
        <div class="d-flex gap-3 align-items-center">
            <span class="text-light">Hello, <?=$_SESSION['user']['username']??''?></span>
            <a href="Controllers/SignOutController.php" class="btn btn-outline-light">Sign Out</a>
        </div>
        <?php
        }else {
        ?>
        <div class="d-flex gap-3">
            <a href="competition-signIn.php" class="btn btn-outline-light">Sign In</a>
            <a href="competition-signUp.php" class="btn btn-outline-light">Sign Up</a>
        </div>
        <?php
        }
        ?>
    </div>
</nav>