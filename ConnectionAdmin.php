<?php require 'header.php' ?>
<?php
session_start();
@$loginAdmin=$_POST['loginAdmin'];
@$PassWordAdmin=$_POST['PassWordAdmin'];
@$connectAdmin=$_POST['connectAdmin'];
$Admlogin='Admin';
$AdmpassWord='Admin2023';
$admErr='';
if(isset($_POST['connectAdmin'])){
    if($loginAdmin==$Admlogin && $PassWordAdmin==$AdmpassWord){
        $_SESSION["autoriser"]="oui";
        header("location:Declaration.php");
    }else{
        $admErr='Connection as Admin  was aborted';
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
                <h2><code>_Autentification As Admin_</code></h2>
            </div>
        </div>
        <form method="post">
            <div class="row my-3">
                <div class="col">
                    <label for="login">Login</label>
                    <input type='text' class='form-control' name='loginAdmin' required placeholder='Full login'/>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <label for="pass">PassWord</label>
                    <input type="password" class='form-control' name='PassWordAdmin' required placeholder='Full PassWord' />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class='btn btn-primary form-control' type='submit' name='connectAdmin'>Connect</button>
                </div>
            </div>
            <div class="row my-1">
                <div class="col">
                    <div class="alert alert-danger"><?php echo $admErr?></div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>