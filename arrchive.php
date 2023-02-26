<?php
require 'db.php';
require 'header.php';
$sql='SELECT * FROM Arrchive';
$statement=$conn->prepare($sql);
$statement->execute();
$arrchive=$statement->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container">
    <div class="row text-center">
        <div class="col">
            <h2><code>_Arrchive_</code></h2>
        </div>
    </div>
    <table class='table table-striped table-primary table-bordered my-2 border-dark'>
        <thead class='text-center'>
            <tr>
                <th>U_IMG</th>
                <th>U_id</th>
                <th>U_Nom</th>
                <th>U_Prenom</th>
                <th>U_Email</th>
                <th>U_Tel</th>
            </tr>
        </thead>
    <?php foreach($arrchive as $a): ?>
        <tbody class='text-center'>
            <tr>
                <td><img src="<?= $a->img?>" style='width:30px'/></td>
                <td><?= $a->id?></td>
                <td><?= $a->nom?></td>
                <td><?= $a->prenom?></td>
                <td><?= $a->email?></td>
                <td>0<?= $a->tel?></td>
            </tr>
        </tbody>
    <?php endforeach;?>
    </table>
</div>