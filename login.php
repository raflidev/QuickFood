<?php
include "koneksi.php";
session_start();
if(isset($_SESSION['status'])){
  header('location:admin/');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet"> 

    <style>
    body{
        font-family: 'Bree Serif', serif;
        background-image: url(img/wall.jpg);
        
        background-attachment: fixed;
        background-position: center; 
    }
    </style>

    <title>QuickFood - Administrator</title>
  </head>
  <body>  
    <div class="container">
    <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
    <div class="card card-signin my-5">
          <div class="card-body">
          <h2 class="text-center my-3">QuickFood</h2>
          <form action='' method='post' class="form-signin">
            <div class="form-group">
                <label for="exampleInputEmail1">username</label>
                <input type="text" class="form-control" name='username' placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name='password' placeholder="Password">
            </div>
            <button name='submit' class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
        </form>
        </div>
        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM login where username='$username' && password='$password'";
  $query = mysqli_query($koneksi, $sql);
  $hasil = mysqli_num_rows($query);

  if(!$hasil >= 1){
    header("location:login.php?m=gagal");
  }else{
    $_SESSION['username'] = $username;
    $_SESSION['status'] = "login";
    header("location:admin/index.php");
  }
}
?>