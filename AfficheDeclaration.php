<?php
require 'db.php';
require 'header.php';
$sql='SELECT * FROM declaration';
$statement=$conn->prepare($sql);
$statement->execute();
$declaration=$statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Select Declaration</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav  aria-label="breadcrumb" class='px-2' id='breadcrumb'>
        <ol class="breadcrumb  justify-content-center">
            <li class="breadcrumb-item"><a href="Declaration.php" class='link-primary fw-bold'>Add Declaration</a></li>
            <li class="breadcrumb-item"><a href="AfficheDeclaration.php" class='link-primary fw-bold'>Show Declaration</a></li>
        </ol>
    </nav>
    <div class="container">
        <div class="row text-center my-2">
            <div class="col">
                <h2><code>_All Problems_</code></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
    <?php foreach($declaration as $m):?>
        <div class="col-4 my-2">
            <div class="toast-header bg-primary text-light">
                <img  class="rounded me-2 bg-secondary text-light" alt='Problem'>
                <strong class="me-auto"><?= $m->NomAdmin?>&nbsp;<?= $m->PrenomAdmin?></strong>
                <samp class='fw-bold'><?= $m->DateDeclaration?></samp>
            </div>
            <div class="toast-body bg-info text-light">
                <h5 class='badge bg-danger p-3 form-control'><?= $m->Problem?></h5>
                <h5 class='badge bg-success p-3 form-control'><?= $m->solution?></h5>
            </div>
            <div class="toast-footer bg-primary text-light">
                <div class="row py-2 px-1">
                    <div class="col">
                        <h5 class='badge bg-warning form-control py-2'>Company : <?= $m->company?></h5>
                    </div>
                    <div class="col">
                        <h5 class='badge bg-warning form-control py-2'>Location : <?= $m->locations?></h5>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
        </div>
    </div>
</body>
</html>