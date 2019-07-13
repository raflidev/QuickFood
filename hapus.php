<?php
session_start();
$id_produk  = $_GET['id'];

unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('Pesanan sudah dihapus dari daftar');</script>";
echo "<script>location='daftar.php';</script>";
?>