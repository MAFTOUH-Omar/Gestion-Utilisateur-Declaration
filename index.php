<?php
session_start();
@$login=$_POST['login']; 
@$passWord=$_POST['passWord']; 
@$connect=$_POST['connect'];
$ValLogin='RTX';
$ValPassWord='2610';
$erreur='';
if(isset($connect)){
    if($login==$ValLogin && $passWord==$ValPassWord){
        $_SESSION["autoriser"]="oui";
        header("location:all.php");
    }else{
        $erreur='Connection Invalid';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Connection</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="shortcut icon"  href="favicon-32x32.png">
</head>
<body>
    <div class="container col-6 my-5">
        <div class="row">
            <div class="col text-center">
                <h2><code>_Autentification_</code></h2>
            </div>
        </div>
        <form method="post">
            <div class="row my-3">
                <div class="col">
                    <label for="login">Login</label>
                    <input type='text' class='form-control' name='login' required placeholder='Full login'/>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="pass">PassWord</label>
                    <input type="password" class='form-control' name='passWord' required placeholder='Full PassWord' />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class='btn btn-primary form-control' type='submit' name='connect'>Connect</button>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <div class="alert alert-danger"><?php echo $erreur?></div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>