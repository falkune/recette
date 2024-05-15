<?php
# definir la classe recette avec les attributs : id, nom, description, liste des ingredients, auteur, image
# avec les methodes : ajoutRecette, modifierRecette, supprimerRecette

class Recette{
    # attribut
    private $id;
    private $nom;
    private $description;
    private $listeIngredients;
    private $auteur;
    private $image;

    # definition du constructeur
    public function __construct($id = null, $nom, $description, $listeIngredients, $auteur, $image){
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->liteIngredients = $listeIngredients;
        $this->auteur = $auteur;
        $this->image = $image;
    }

    # definir la methode ajoutRecette
    public function ajoutRecette(){
        # etablir la connexion avec la bd
        $db = new PDO("mysql:host=localhost;dbname=recettes", "root", "root");
        # preparer la requete
        $request = $db->prepare("INSERT INTO recettes (nom, description, liste_ingredient, image, id_user) VALUES (?, ?, ?, ?, ?)");
        # executer la requete
        $request->execute(array($this->nom, $this->description, $this->liteIngredients, $this->image, $this->auteur));
    }

}