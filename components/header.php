<?php
require_once "data/connect.php";

session_start();

$username = "";
$password = "";
$loginError = false;


if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST['username'];  
  $password = $_POST['password'];  

  if(!$username || !$password){
    $loginError = true;
  }
  else{
    $loginError = false;
    $statement = $pdo->prepare("SELECT * FROM adminlogin WHERE username = :username AND password = :password");
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if($user){
      $_SESSION['user_id'] = $user['id'];
      header('Location: admin/logined.php');      
      exit();
    }
    else{
      $loginError = true;
    }
  }
}

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Master Pc</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="app.js" defer></script>
</head>
<body>
  <header class="header">
    <?php if($loginError): ?>
      <div class="alert alert-danger" role="alert">
        <h5>inccorect username or password</h5>
      </div>
    <?php endif ?>
    <nav class="navbar navbar-expand-lg nav-bar">
      <div class="container-fluid nav-border">
        <div class="content">
          <a href=""><img src="imgs/Logo.png" alt="" class="logo-photo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">PC კომპიუტერები</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  კომპიუტერის ნაწილები
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">დედაბარათები</a></li>
                  <li><a class="dropdown-item" href="#">პროცესორები</a></li>
                  <li><a class="dropdown-item" href="#">პროცესორის ქულერები</a></li>
                  <li><a class="dropdown-item" href="#">მეხსიერების მოდულები</a></li>
                  <li><a class="dropdown-item" href="#">ვიდეობარათები</a></li>
                  <li><a class="dropdown-item" href="#">ვინჩესტერები HDD</a></li>
                  <li><a class="dropdown-item" href="#">ვინჩესტერები SSD</a></li>
                  <li><a class="dropdown-item" href="#">ვინჩესტერები M2</a></li>
                  <li><a class="dropdown-item" href="#">კვების ბლოკები</a></li>
                  <li><a class="dropdown-item" href="#">ქეისები</a></li>
                  <li><a class="dropdown-item" href="#">ქეისის ქულერები</a></li>
                  <li><a class="dropdown-item" href="#">დისკის წამკითხველები</a></li>
                  <li><a class="dropdown-item" href="#">ვიდეობარათის ქულერები</a></li>
                  <li><a class="dropdown-item" href="#">ხმის ბარათები</a></li>
                  <li><a class="dropdown-item" href="#">ქსელის ბარათები</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  კომპიუტერის აქსესუარები
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">თერმო პასტები</a></li>
                  <li><a class="dropdown-item" href="#">თერმო ბალიშები</a></li>
                  <li><a class="dropdown-item" href="#">Flash ბარათები</a></li>
                  <li><a class="dropdown-item" href="#">გარე ვინჩესტერები</a></li>
                  <li><a class="dropdown-item" href="#">გარე ვინჩესტერის ყუთები</a></li>
                  <li><a class="dropdown-item" href="#">გარე  M2 ვინჩესტერები</a></li>
                  <li><a class="dropdown-item" href="#">გარე  DVD წამკითხველები</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-danger" type="submit">Search</button>
            </form>
            <div class="login-formCont">
              <button class="login-btn" onclick="loginFormShow()">შესვალ</button>
              <div class="loginForm">
                <form method="post" enctype="multipart/form-data">
                  <div>
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" class="form-control" style="height: 30px;" name="username">
                  </div>
                  <div>
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" style="height: 30px;" name="password">
                  </div>
                  <button type="submit" style="height: 30px;" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
