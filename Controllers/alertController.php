<?php
    if(isset($_SESSION['alert'])) {
?>
    <div class="alert <?=$_SESSION['alert']['css']?>"><?=$_SESSION['alert']['message']?></div>
<?php
    }unset($_SESSION['alert']);
?>