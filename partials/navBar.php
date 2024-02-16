
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/index.css">
</head>
<body>
    
  <nav id="navbar" class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">Zoo</a>
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
              <a class="nav-link" href="#">les employés</a>
            </li>
          </ul>
          
        </div>
      </div>
    </div>
  </nav>


<?php include __DIR__ . '/../setting/messages.php' ?>