<?php
require 'db.php';
if(isset($_POST['connect'])){
    $email=$_POST['email'];
    $_password_=$_POST['_password_'];
    $sql='select * from technicien where email=:email and _password_=:_password_';
    $statement=$conn->prepare($sql);
    if($statement->execute([':email'=>$email,':_password_'=>$_password_])){
        session_start();
        header('location:Problems.php');
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connection Technicien</title>
    <link rel="stylesheet" href="bootstarp.css">
    <?php require 'Technicien.php'?>
</head>
<body>
    <div class="container col-7 ">
        <div class="row text-center my-1">
            <div class="col">
                <h2><code>_Connection AS Technicien_</code></h2>
            </div>
        </div>
        <form method="post">
        <div class="row my-1">
            <div class="col">
                <label for="" class='badge bg-info form-control'>Email</label>
                <input type="text" name='email' class='form-control border-dark' required>
            </div>
        </div>
        <div class="row my-1">
            <div class="col">
                <label for="" class='badge bg-info form-control'>Mote de Pass</label>
                <input type="password" name='_password_' class='form-control border-dark' required>
            </div>
        </div>
        <div class="row my-1">
            <div class="col">
                <button class='btn btn-info form-control border-dark' type='submit' name='connect'>Connect</button>
            </div>
        </div>
        </form>
    </div>
</body>
</html>