<?php
require 'db.php';
if(isset($_POST['send'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $specialite=$_POST['specialite'];
    $sql='INSERT INTO technicien(nom,prenom,email,specialite,_password_) VALUES(:nom,:prenom,:email,:specialite,:_password_)';
    $statement=$conn->prepare($sql);
    if($statement->execute([':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':specialite'=>$specialite,':_password_'=>$_password_])){
        header('location:ConnectionTechnicien.php');
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php require 'Technicien.php' ?>
    <div class="container">
        <div class="row text-center my-1">
            <div class="col">
                <h2><code>_Inscription Technicien_</code></h2>
            </div>
        </div>
        <form method="post">
        <div class="row my-1">
            <div class="col">
                <label class='badge bg-primary form-control'>Nom</label>
                <input type="text" name='nom' class='form-control border-dark' required>
            </div>
            <div class="col">
                <label class='badge bg-primary form-control'>Prenom</label>
                <input type="text" name='prenom' class='form-control border-dark' required>
            </div>
            <div class="col-6">
                <label class='badge bg-primary form-control'>Email</label>
                <input type="text" name='email' class='form-control border-dark' required>
            </div>
        </div>
        <div class="row my-1">
            <div class="col">
                <label class='badge bg-primary form-control'>Specialite</label>
                <input type="text" name='specialite' class='form-control border-dark' required> 
            </div>
        </div>
        <div class="row my-1">
            <div class="col">
                <label class='badge bg-warning form-control'>Mot de pass</label>
                <input type="text" name='_password_' class='form-control border-dark' required> 
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class='btn btn-primary form-control' type='submit' name='send'>Inscri</button>
            </div>
        </div>
    </div>
    </form>
</body>
</html>