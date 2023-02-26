<?php
require 'db.php';
require 'header.php';
if(isset($_GET['sup'])){
    $id=$_GET['sup'];
    $sql='DELETE FROM user WHERE id=:id';
    $statement=$conn->prepare($sql);
    if($statement->execute([':id'=>$id])){
        echo'<div class="container"><div class="row"><div class="col"><div class="alert alert-success">Suppresion valid!</div></div></div></div>';
    }
    else
        echo'<div class="container"><div class="row"><div class="col"><div class="alert alert-danger">Suppresion Invalid!</div></div></div></div>';
}
?>
<div class="container">
    <div class="row">
        <div class="col-2">
            <div class="alert alert-primary">
                <a calss="alert-link" href='all.php'>Back Index</a>
            </div>
        </div>
    </div>
</div>