<?php 

require_once "../setting/db.php";
require_once "../setting/autoLoader.php";

$loadEmployer = New EmployerManager($connexion);

$employer = $loadEmployer->getAll($_POST);


include "../partials/navBar.php"

?>


<!-- lien vers la feuille se style spécifique a la page --> <link rel="stylesheet" href="../style/gestion_employer.css">




    <!-- DEBUT formulaire pour créer un employé  -->

    <section class="container mt-5">
        <form action="../process/addEmploye.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nom</label>
                <input type="texte" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">age</label>
                <input type="number" class="form-control" name="age">
            </div>
            <div class="mb-3">
                <select name="sexe" class="form-select">
                    <option>sexe</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                </select>
            </div>
            <input type="hidden" name="Gold" value="100">
            <input type="hidden" name="Forme" value="10">
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </section>

    <!-- FIN formulaire pour créer un employé  -->

    <section class="d-flex justify-content-center align-items-center">

        <?php foreach ($employer as $key) {
        
        ?>  <div class="card m-3" style="width: 18rem;">
            <img src="../images/employer.png" class="card-img-top" alt="portrait dessin d'un employer du Zoo">
            <div class="card-body">
            <h5 class="card-title"><?=$key->getName()?></h5>
            <h5  class="card-text"><?= $key->getSexe()?></h5>
            <h5  class="card-text"><i class="fa-brands fa-bitcoin fa-lg" style="color: #000000;"></i><?= $key->getGold()?></h5>
            <h5  class="card-text"><i class="fa-solid fa-bolt fa-lg" style="color: #000000;"></i><?= $key->getForme()?></h5>
            <a href="../process/sessionEmployer.php?Employer_id=<?=$key->getId()?>" class="btn btn-success">Travailler avec l'employer</a>
            <a href="../process/ReposerEmployer.php" class="btn btn-primary">Envoyer en Repos</a>
            <a href="../process/delateEmployer.php?Employer_id=<?=$key->getId()?>" class="btn btn-danger">Virer l'employer</a>
            </div>
            </div>

        <?php } ?>
    </section>

    <!-- DEBUT include la Footer -->
    
    <?php include "../partials/Footer.php"?>

    <!-- FIN include la Footer -->