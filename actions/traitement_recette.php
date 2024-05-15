<?php
session_start();
require_once "../classes/recette.php";

# si l'utilisateur valide le formulaire de publication de recette
if(isset($_POST['add'])){
    # recuperer la saisie de l'utilisateur
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $listIngredient = $_POST['list_ingredient'];
    $user = $_SESSION['user'];
    $auteur = $user['id'];

    $imgName = date("YmdHis").'.'.explode('/', $_FILES['image']['type'])[1];
    $tmpName = $_FILES['image']['tmp_name'];

    if(move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'].'/recette/imgs/'.$imgName)){
        $recette = new Recette(null, $nom, $description, $listIngredient, $auteur, $imgName);
        $recette->ajoutRecette();
    }else{
        
    }
}
