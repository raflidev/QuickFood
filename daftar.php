<?php
session_start();
include 'koneksi.php';

if(empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])){
    echo "<script>alert('Daftar kosong, silakan pesan terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}
?>
<?php
// echo "<pre>";
//  print_r($_SESSION);
//  echo "</pre>";
?>
<!DOCTYPE html>
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
    .active, .btn:hover {
    background-color: #666;
    color: white;
    }
    </style>
    <title>QuickFood</title>
  </head>
<body>
<div class="container">
  <div class="card py-2 my-1" style="width: 100%; height: 20%;">
    <h1 class='text-center'>QuickFood</h1>
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center">
    <a class='mr-2' href="index.php">Home</a>
    <a class='mr-2' href="index.php#about">About</a>
    <a class='mr-2' href="pesan.php">Menu</a>
    </div>
    </div>

  </div>
  <h3>Daftar pesanan</h3>
    <hr>
    <table class='table table-bordered table-responsive-sm'>
    <thead>
    <tr>
    <th>No</th>
    <th>Pesanan</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Subharga</th>
    <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php  $no=1; ?>
    <?php foreach ($_SESSION['keranjang'] as $id_pesan => $jmlh):?>
    <?php
   
    $query = mysqli_query($koneksi, "SELECT * FROM menu where id=$id_pesan");
    $row = mysqli_fetch_assoc($query);
    $subharga = $row['harga']*$jmlh;
    ?>
    <tr>
    <td><?= $no++ ?></td>
    <td><?= $row['title'] ?></td>
    <td><?= $row['harga'] ?></td>
    <td><?= $jmlh ?></td>
    <td>Rp.<?= number_format($subharga);?></td>
    <td>
    <a href="hapus.php?id=<?= $id_pesan ?>" class="btn btn-danger">Hapus</a>
    </td>
    </tr>
    <?php endforeach ?>
    </tbody>
    </table>
    <div class="float-right">
    <a class="btn btn-primary mb-2" href="index.php" role="button">Pesan lagi</a>
    <a class="btn btn-warning text-white mb-2" href="checkout.php" role="button">Checkout</a>
    </div>

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
  </div>
  
</body>
</html>