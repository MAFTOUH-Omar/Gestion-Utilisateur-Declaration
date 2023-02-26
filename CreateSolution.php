<?php
require 'db.php';
require 'Technicien.php';
if(isset($_GET['crs'])){
    $id=$_GET['crs'];
    if(isset($_POST['send'])){
        $solution=$_POST['solution'];
        $sql='update solution set solution=:solution where id=:id';
        $statement=$conn->prepare($sql);
        if($statement->execute([':solution'=>$solution,':id'=>$id])){
            header('location:Problems.php');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Solution</title>
</head>
<body>
    <div class="container col-8">
        <div class="row text-center">
            <div class="col">
                <h2><code>_Create Solution_</code></h2>
            </div>
        </div>
        <form method="post">
            <div class="row my-2">
                <div class="col">
                    <label for="" class='badge bg-secondary form-control'>Solution</label>
                    <input type="text" class='form-control' required name='solution'>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <button class='btn btn-success form-control' type='submit' name='send'>Send Solution</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>