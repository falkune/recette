<?php
session_start(); # pour la gestion des sessions
# impoert des fichier requis
require_once "../classes/user.php";
# si l'utilisateur valide le formulaire d'inscription
if(isset($_POST['register'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pswd = $_POST['password'];

    # creer une instance de la classe User
    $user = new User(null, $nom, $prenom, $email, $pswd);
    # appliquer la methode inscription sur l'objet $user
    $user->inscription();
}

# si l'utilisateur valide le formulaire de connexion
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pswd = $_POST['password'];

    if(User::connexion($email, $pswd)){
        header("Location: http://localhost/recette");
    }
}