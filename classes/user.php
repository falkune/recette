<?php
# creez la classe User qui pour attributs:
// - id
// - nom
// - prenom
// - email
// - pswd

// et les methodes: inscription, connexion, deconnexion
// definissez le constructeur pour initialiser les attributs.

class User {
    # les attributs
    private $id = null;
    private $nom;
    private $prenom;
    private $email;
    private $pswd;

    # le constructeur de la class
    public function __construct($id = null, $nom, $prenom, $email, $mdp){
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->pswd = password_hash($mdp, PASSWORD_DEFAULT);
    }

    # methode inscription (permet d'iscrire un user)
    public function inscription(){
        # etablir la connexion avec la bd
        $db = new PDO("mysql:host=localhost;dbname=recettes", "root", "root");
        # preparer la requete
        $request = $db->prepare("INSERT INTO users (nom, prenom, email, pswd) VALUES (?, ?, ?, ?)");
        # executer la requete
        $request->execute(array($this->nom, $this->prenom, $this->email, $this->pswd));
    }

    # methode pour connecter l'user
    public static function connexion($email, $mdp){
        # etablir la connexion avec la bd
        $db = new PDO("mysql:host=localhost;dbname=recettes", "root", "root");
        # preparer la requete
        $request = $db->prepare("SELECT * FROM users WHERE email = ?");
        # executer la requete
        $request->execute(array($email));
        # recuperer le resultat de la requete
        $user = $request->fetch();

        if(empty($user)){
            echo "Cet utilisateur n'existe pas";
        }else{
            # verifier si le mot de passe est conforme
            if(password_verify($mdp, $user['pswd'])){
                # demarer la session de cet user
                $_SESSION['user'] = $user;
                return true;
            }else{
                echo "Mot de passe incorrecte";
            }
        }
    }
}