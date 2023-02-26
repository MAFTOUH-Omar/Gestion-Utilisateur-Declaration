<?php
require 'db.php';
require 'Technicien.php';
$sql='SELECT * FROM solution';
$statement=$conn->prepare($sql);
$statement->execute();
$solution=$statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Solution</title>
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <h2><code>_Create Solution_</code></h2>
            </div>
        </div>
        <table class='table table-striped table-bordered border-dark text-center'>
            <thead>
                <tr>
                    <th>_id</th>
                    <th>F_Name</th>
                    <th>L_Name</th>
                    <th>Location</th>
                    <th>Company</th>
                    <th>D_Declaration</th>
                    <th>Declaration</th>
                    <th>Solution</th>
                    <th>Opr</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($solution as $s):?>
                    <tr>
                        <td><?= $s->id?></td>
                        <td><?= $s->NomAdmin?></td>
                        <td><?= $s->PrenomAdmin?></td>
                        <td><?= $s->company?></td>
                        <td><?= $s->locations?></td>
                        <td class='text-primary fw-bold'><?= $s->DateDeclaration?></td>
                        <td class='text-danger fw-bold'><?= $s->declaration?></td>
                        <td class='text-success fw-bold'><?= $s->solution?></td>
                        <td><a href="CreateSolution.php?crs=<?= $s->id?>" class='btn btn-success'>Solution</a></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</body>
</html>