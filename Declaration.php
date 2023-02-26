<?php
require 'db.php';
require 'header.php';
$message='';
if(isset($_POST['send'])){
    $NomAdmin=$_POST['NomAdmin'];
    $PrenomAdmin=$_POST['PrenomAdmin'];
    $company=$_POST['company'];
    $locations=$_POST['locations'];
    $Problem=$_POST['Problem'];
    $sql='INSERT INTO declaration(NomAdmin,PrenomAdmin,Problem,DateDeclaration,locations,company) VALUES(:NomAdmin,:PrenomAdmin,:Problem,curdate(),:locations,:company)';
    $statement=$conn->prepare($sql);
    if($statement->execute([':NomAdmin'=>$NomAdmin,':PrenomAdmin'=>$PrenomAdmin,':Problem'=>$Problem,':locations'=>$locations,':company'=>$company])){
        $message='Insertion valid!';
        header('location:AfficheDeclaration.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Declaration</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon"  href="favicon-32x32.png">
</head>
<body>
    <div class="container col-6 mb-3">
        <nav  aria-label="breadcrumb" class='px-2' id='breadcrumb'>
        <ol class="breadcrumb  justify-content-center">
            <li class="breadcrumb-item"><a href="Declaration.php" class='link-primary fw-bold'>Add Declaration</a></li>
            <li class="breadcrumb-item"><a href="AfficheDeclaration.php" class='link-primary fw-bold'>Show Declaration</a></li>
        </ol>
        </nav>
        <div class="row text-center my-3">
            <div class="col">
                <h2><code>_Admin Declaration_</code></h2>
            </div>
        </div>
        <form method="post">
        <div class="row my-2">
            <div class="col">
                <label for="NomAdmin" class='badge bg-primary'>First Name Admin</label>
                <input type="text" class='form-control' name='NomAdmin' required>
            </div>
            <div class="col">
                <label for="PrenomAdmin" class='badge bg-primary'>Last Name Admin</label>
                <input type="text" class='form-control' name='PrenomAdmin' required>
            </div>
        </div>
        <div class="row my-2">
                <div class="col">
                    <label for="locations" class='badge bg-success'>Location Name</label>
                    <input type="text" class='form-control' name='locations' required>
                </div>
                <div class="col">
                    <label for="company" class='badge bg-success'>Company Name</label>
                    <input type="text" class='form-control' name='company' required>
                </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <label for="Problems" class='badge bg-danger'>Problem</label>
                <textarea name="Problem"  cols="30" rows="6" class='form-control'></textarea>
            </div>
        </div>
        <div class="row my-1">
            <div class="col">
                <button class='btn btn-outline-danger form-control' name='send' type='submit'>Send Problem</button>
            </div>
            <div class="col">
                <a href="AfficheDeclaration.php" class='btn btn-outline-info form-control'>Show Problems</a>
            </div>
        </div>
        </form>
        <div class="row my-1">
            <div class="col">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success"><?= $message;?></div>
                <?php else: ?>
                    <div class="alert alert-danger">Err!</div>
                <?php endif; ?>
            </div> 
        </div>
    </div>

</body>
</html>
