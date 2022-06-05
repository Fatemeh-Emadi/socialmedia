<?php //session_start();
include "model/database.php";

?>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">facebook</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <?php if($_SESSION["login_status"] != null && $_SESSION["login_status"] == true):?>
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=""><i class="fa fa-user"></i> <?php echo $_SESSION["username"];?></a>
        </li>
        <?php endif;?>
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="personal">profile</a></li>
        <?php if($_SESSION["login_status"] != null && $_SESSION["login_status"] == true):?>
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">log out</a>
        </li>
        <?php endif;?>
        
      </ul>
      
    </div>
  </div>
</nav>