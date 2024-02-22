<?php 

if (!empty($_SESSION['employer'])) {
    session_destroy();
}

header("Location: ../pages/GestionEmployer.php");