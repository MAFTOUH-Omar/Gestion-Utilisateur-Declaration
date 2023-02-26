<?php
require 'db.php';
if(isset($_GET['upd'])){
    $id=$_GET['upd'];
if(isset($_POST['update'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $sql='UPDATE user SET nom=:nom , prenom=:prenom , email=:email , tel=:tel WHERE id=:id';
    $statement=$conn->prepare($sql);
    if($statement->execute([':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':tel'=>$tel,':id'=>$id])){
        header('location:all.php');
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update User</title>
</head>
<body>
    <?php require 'header.php'?>
    <div class="container col-6">
            <div class="row">
                <div class="col text-center">
                    <h2><code>_Update User_</code></h2>
                </div>
            </div>
        <form method="POST">
            <div class="row my-2">
                <div class="col">
                    <label for="nom" class='badge bg-dark'>Nom</label>
                    <input type="text" class='form-control' name='nom' id='nom' >
                </div>
                <div class="col">
                    <label for="prenom" class='badge bg-dark'>Prenom</label>
                    <input type="text" class='form-control' name='prenom' id='prenom' >
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <label for="email" class='badge bg-dark'>Email</label>
                    <input type="text" class='form-control' name='email' id='email' >
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <label for="tel" class='badge bg-dark'>Tel</label>
                    <input type="number" class='form-control' name='tel' id='tel' >
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <button class='btn btn-dark form-control' type='submit' name='update'>Update User</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>