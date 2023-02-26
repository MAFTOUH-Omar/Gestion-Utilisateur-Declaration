<?php
require 'db.php';
require 'header.php';
if(isset($_POST['new'])){
    $sql='SELECT * FROM user ORDER BY id DESC';
    $statement=$conn->prepare($sql);
    $statement->execute();
    $user=$statement->fetchAll(PDO::FETCH_OBJ);
}else if(isset($_POST['search'])){
    $ids=$_POST['searchid'];
    $sql='SELECT * FROM user WHERE id=:ids';
    $statement=$conn->prepare($sql);
    $statement->execute([':ids'=>$ids]);
    $user=$statement->fetchAll(PDO::FETCH_OBJ);
}else{
    $sql='SELECT * FROM user ORDER BY id ASC';
    $statement=$conn->prepare($sql);
    $statement->execute();
    $user=$statement->fetchAll(PDO::FETCH_OBJ);
}
?>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h2><code>_Tous les utilisateurs_</code></h2>
        </div>
    </div> 
    <form method="post">
        <div class="row my-2">
                <div class="col-2">
                    <button class='btn btn-light form-control border-dark' name='new'>New</button>
                </div>
                <div class="col-4">
                    <input type="number" class='form-control border-dark' placeholder='Search by id...' name='searchid'>
                </div>
                <div class="col-2">
                    <button name='search' type='submit' class='btn btn-primary form-control border-dark'>🔎&nbsp;&nbsp;Search</button>
                </div>
                <div class="col-2">
                    <button class='btn btn-secondary form-control border-dark'>Old</button>
                </div>
                <div class="col-1">
                    <a class='btn btn-warning text-dark form-control border-dark' href='export_table_JSON.php'>JSON</a>
                </div>
                <div class="col-1">
                    <a class='btn btn-success form-control border-dark' href='export_table_CSV.php'>EXEL</a>
                </div>
        </div>
    </form>
    <div class="row my-3">
        <?php foreach($user as $x): ?>
            <div class="col-4 text-center">
                <div class="card border-dark">
                    <div class="card-title">
                        <img class="card-img-top" src='<?= $x->img?>' style='height:200px;width:200px'/>
                        <div class="row">
                            <div class="col">
                                <code>_Id :</code>
                                <span class='badge bg-info'><?= $x->id;?></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <code>_Nom :</code>&nbsp;<span class='badge bg-primary'><?= $x->nom;?></span>
                                <code>_Prenom :</code>&nbsp;<span class='badge bg-primary'><?= $x->prenom;?></span>
                            </div>
                        </div>
                        <table class='table'>
                            <tr><th><code>_Email : </code></th><td class='badge bg-success my-2'><?= $x->email?></td></tr>
                            <tr><th><code>_Tel : </code></th><td class='badge bg-secondary'>0<?= $x->tel?></td></tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a href='delete.php?sup=<?= $x->id;?>' class='btn btn-danger form-control'>✂&nbsp;&nbsp;Delete</a>
                            </div>
                            <div class="col">
                                <a href='update.php?upd=<?= $x->id;?>' class='btn btn-warning form-control'>⚙&nbsp;&nbsp;Update</a>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col">
                                <button class='btn btn-success form-control' onclick='window.print()'>🖨&nbsp;&nbsp;Imprimer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>