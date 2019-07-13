<?php
session_start();
error_reporting(0);
$id_pesan = $_GET['id'];
$jmlh = $_GET['jumlah'];

    $_SESSION['keranjang'][$id_pesan]+=$jmlh;

?>

<!-- <pre>
<?php //print_r($_SESSION);?>
</pre> -->

<script>alert("Pesanan ditambahkan ke daftar")</script>
<script>location='daftar.php';</script>