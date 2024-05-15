<?php
    session_start();
    include 'includes/header.php'; 
?>

<div class="container">

    <div style="margin: 150px auto;" class="w-50">
        <h1 class="text-center">Inscription</h1>
        <form action="actions/traitement_user.php" method="post">
            <!-- le nom -->
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control">
            </div>

            <!-- prenom -->
            <div class="mb-3">
                <label class="form-label">Prenom</label>
                <input type="text" name="prenom" class="form-control">
            </div>

            <!-- email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            <!-- password -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" >
            </div>

            <button name="register" class="btn btn-primary">Inscription</button>
        </form>
    </div>

</div>
    
<?php include "includes/footer.php"; ?>