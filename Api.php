<?php
require 'db.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

    $data = [];
    $req ="select * from  user";
    foreach($conn->query($req) as $ligne){ 
        $row  =array(
            "id"=>$ligne['id'],
            "nom"=>$ligne['nom'],
            "prenom"=>$ligne['prenom'],
            "email"=>$ligne['email'],
            "tel"=>$ligne['tel']
        );
        array_push($data, $row);
    }
    echo json_encode($data);
?>