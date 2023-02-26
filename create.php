<?php
require'db.php';
require'header.php';
$message='';
if(isset($_POST['add'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $sql='INSERT INTO user(nom,prenom,email,tel) VALUES(:nom,:prenom,:email,:tel)';
    $statement=$conn->prepare($sql);
    if($statement->execute([':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':tel'=>$tel])){
        $message='Insertion valid!';
    }
}
?>
<div class='container col-6'>
    <div class="row">
        <div class="col text-center">
            <h2><code>_Create un utilisateur_</code></h2>
        </div>
    </div>
    <form method='post' class='my-2'>
        <div class="row my-1">
            <div class="col">
                <label for="nom" class='badge bg-success'>Nom</label>
                <input type="text" name='nom' id='nom' class='form-control'  required placeholder='Fill last name'>
            </div>
            <div class="col">
                <label for="prenom" class='badge bg-success'>Prenom</label>
                <input type="text" name='prenom' id='prenom' class='form-control'  required placeholder='Fill first names'>
            </div>
        </div>
        <div class="row my-1">
                <div class="col">
                    <label for="email" class='badge bg-success'>Email</label>
                    <input type="text" name='email' id='email' class='form-control'  required placeholder='Fill Email'>
                </div>
        </div>
        <div class="row my-1">
                <div class="col">
                    <label for="tel" class='badge bg-success'>Telephone</label>
                    <input type="number" name='tel' id='tel' class='form-control'  required placeholder='Fill Phone'>
                </div>
        </div>
        <div class="row my-1">
                <div class="col">
                    <button class='btn btn-success form-control' type='submit' name='add'>Envoyer!</button>
                </div>
        </div>
                <?php if(!empty($message)): ?>
                    <div class="row my-1">
                        <div class="col">
                            <div class="alert alert-success">
                                <?=$message;  ?>
                            </div>
                        </div>
                    </div>
                <?php else:?>
                    <div class="row my-1">
                        <div class="col">
                            <div class="alert alert-danger">
                                Insertion Invalid !
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
    </form>
</div>