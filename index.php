<?php 
include 'koneksi.php';
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
    <a class='mr-2' href="index.php#menu">Menu</a>
    </div>
    </div>
    
  
  </div>
<section id="menu">
  <div id="myDIV">
<form action="index.php" class='my-2' method="post">
    <button type="submit" name='all active' class="btn btn-sm p-1">#All</button>
    <button type="submit" name='ma' class="btn  btn-sm p-1 ">#Makanan</button>
    <button type="submit" name='mi' class="btn  btn-sm p-1 ">#Minuman</button>
    <button type="submit" name='de' class="btn  btn-sm p-1 ">#Dessert</button>
    <small class='float-right p-1'><a href="login.php">Login!</a></small>    
</form>


</div>
<?php
if(isset($_POST['ma'])){
    $sql = "SELECT * FROM menu where cat='makanan'";
}else if(isset($_POST['mi'])){
    $sql = "SELECT * FROM menu where cat='minuman'";
}else if(isset($_POST['de'])){
    $sql = "SELECT * FROM menu where cat='dessert'";
}else{
  $sql = "SELECT * FROM menu";
}
$query = mysqli_query($koneksi, $sql);
$no = 1;
?> 
<div class="row">
    <?php while($row=mysqli_fetch_array($query)){ ?>
     
        <div class="col-md-4">
        <form action="beli.php" method="get">
          <div class="card">
          
          <img src="<?= $row['image'] ?>" class="card-img-top" >
            <div class="card-body">
            <button type="button" class="float-right btn btn-secondary btn-sm mb-1 p-1" disabled>#<?= $row['cat'] ?></button>
              <h5 class="card-title"><?= $row['title']?></h5>
              <p class="card-text float-right mb-1">Rp.<?= $row['harga'] ?></p>
              
              <div class="form-group">
              <label>Jumlah</label>
              <input type="text" class="form-control" name="jumlah" value='1'>
              </div>
              <button type='submit' name='id' value='<?= $row['id'] ?>' class="btn btn-block btn-primary">Beli</button>
            </div>
          </div>
          </form>
        </div>
        
    <?php } ?>
   
    </div> 
</section>
  
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