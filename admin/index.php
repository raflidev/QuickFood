<?php
include '../koneksi.php';
 
// mengaktifkan session
session_start();
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../login.php");
}
 
// menampilkan pesan selamat datang
// echo "Hai, selamat datang ". $_SESSION['username'];
 
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet"> 
    
    <style>
    body{
        font-family: 'Bree Serif', serif;
    }
    </style>
    <title>QuickFood - Administrator</title>
  </head>
  <body>
  <div class="container">
  <div class="card py-2 my-1" style="width: 100%; height: 20%;">
    <h1 class='text-center'>QAdministor</h1>
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center">
	<form action="" method="post">
    <button class='mr-2 px-4 btn btn-primary' name="dashboard">Dashboard</button>
    <button class='mr-2 px-4 btn btn-primary' name="kasir">Kasir</button>
	</form>
    </div>
    </div>
    
  
  </div>
  <?php
$username = $_SESSION["username"];
$sql = "SELECT * FROM login where username='$username'";
$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($query);

?>
<div class="card p-3 my-1" style="width: 100%; height: 20%;">
<form method='post'>
<small class='float-right' >Halo,<?= $_SESSION['username'] ?> | <a href="logout.php">Logout!</a> </small>
<h2>Dashboard</h2>
  <button class="btn btn-success" name='tambahmenu'>Tambah Menu</button>
</form>
<?php if(isset($_POST['tambahmenu'])){
	include 'tambah.php';
}else if(isset($_POST['level'])){ 
	include 'level.php';
}
?>
</div>

  
  <div id="myDIV">

</div>

<?php if(isset($_POST['kasir'])){
	include 'kasir.php';
}else if(isset($_POST['kasir'])){ 
	include 'dashboard.php';
}if(isset($_POST['detail'])){
	include 'detail.php';
}else if(isset($_POST['lunas'])){ 
  include 'lunas.php';
}
?>

  
    <section id='about' class='text-center'>
    <div class="card py-1 my-1" style="width: 100%; height: 20%;">
    <div class="row">
    <div class="col-md-4 col-12">
    <h3>QuickFood</h3>
    <p >
      "QuickFood, QuickOrder, veryQuick"
    </p>
    </div>
    <div class="col-md-4 col-12">
    
    </div>
    <div class="col-md-4 col-12">
    <h5>Address</h5>
    Jl.Raya Mekar No.45<br>
    Tamsel, Bekasi, 17220
    </div>
    </div>
    
    </div>
    <p class='text-center'>Copyright 2019 &copy; Rafli - Bekasi </p>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>