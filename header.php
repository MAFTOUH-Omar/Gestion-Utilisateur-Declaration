<!DOCTYPE html>
<html lang="en">
<head>
    <title>header</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon"  href="favicon-32x32.png">
</head>
<body>
  <div class="container">
    <nav class='navbar navbar-expand-lg navbar-info bg-dark d-fixe justify-content-center'>
        <h5 title='Create User'><a href='create.php'  class='text-light nav-link'>Create_U</a></h5>
        <h5 title='ALL User'><a href='all.php'  class='text-light nav-link'>All_U</a></h5>
        <h5 title='Arrchive User'><a href='arrchive.php'  class='text-light nav-link'>Arrchive_U</a></h5>
        <h5 title='Update User'><a href='update.php'  class='text-light nav-link'>Update_U</a></h5>
        <h5 title='Connection As Admin'><a href='ConnectionAdmin.php'  class='text-light nav-link'>Connection_Admin</a></h5>
        <h5 title='Technicien'><a href='Technicien.php'  class='text-light nav-link'>Technicien</a></h5>
        <a class='btn btn-info' id='connecter' href='deconnection.php'>Deconnecter</a>
    </nav>
    <nav  aria-label="breadcrumb" class='py-3 px-2' id='breadcrumb'>
      <ol class="breadcrumb  justify-content-center">
        <li class="breadcrumb-item"><a href="all.php" class='link-primary fw-bold'>ALL Users</a></li>
        <li class="breadcrumb-item"><a href="create.php" class='link-primary fw-bold'>Create Users</a></li>
        <li class="breadcrumb-item"><a href="arrchive.php" class='link-primary fw-bold'>Arrchive Users</a></li>
        <li class="breadcrumb-item"><a href="update.php" class='link-primary fw-bold'>Update Users</a></li>
      </ol>
    </nav>
  </div>
</body>
</html>