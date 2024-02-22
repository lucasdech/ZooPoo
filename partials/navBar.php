<?php
if (!empty($_SESSION['employer']) && $_SESSION['employer']->getForme() == 0) {
  header("Location: /process/delateEmployer.php?Employer_id=" . $_SESSION['employer']->getId());
  die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/index.css">
      <style>
        .body {
          background-color: #325a26;
          height: 130vh;
        }
      </style>
</head>
<body class="body">
    
  <nav id="navbar" class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">Zoo</a>
      <div class="text-white">

        <? if (!empty($_SESSION['employer'])) {

              if ($_SESSION['employer']->getForme() == 3) {

                $message='L\'Employé commence a avoir besoin de repos .... Plus que 3 energies avant la mort';
 
                echo '<script type="text/javascript">window.alert("'.$message.'");</script>'; 
              }elseif ($_SESSION['employer']->getForme() == 0) {
                
                $message='L\'Employé est mort Veuilez en vhoisir un autre ...';
 
                echo '<script type="text/javascript">window.alert("'.$message.'");</script>'; 

              }

            echo  $_SESSION['employer']->getName() . " " .
                  $_SESSION['employer']->getGold()?> <i class="fa-brands fa-bitcoin fa-lg" style="color: #ffffff;"></i> <?=
                  $_SESSION['employer']->getForme()?><i class="fa-solid fa-bolt fa-lg" style="color: #ffffff;"></i> 
      
      <?php } else {

            echo "pas d'employer selectionner";
      
      } ?>

      <a class="btn btn-outline-light" href="../process/sessionStop.php">Changer d'employer</a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header bg-dark">
          <h5 class="offcanvas-title text-white" id="offcanvasDarkNavbarLabel">Bienvenue au Zoo</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-dark">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Menu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/GestionEnclos.php">les Enclos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/GestionAnimaux.php">les Animaux</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pages/GestionEmployer.php">les employés</a>
            </li>
          </ul>
          
        </div>
      </div>
    </div>
  </nav>


<?php include __DIR__ . '/../setting/messages.php'?>
