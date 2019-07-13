<?php
$id = $_POST['lunas'];

$sql = "SELECT * from checkout where id_pembeli= $id";
$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($query);
if($query == TRUE){
$waktu = $row['waktu'];
$total = $row['total'];

$sql2 = "INSERT into lunas values('','$waktu','$total') ";
$query2 =  mysqli_query($koneksi, $sql2);
if($query2 == TRUE){
    $sql3 = "DELETE FROm checkout where id_pembeli= $id";
    $query3 = mysqli_query($koneksi, $sql3);
    if($query3 == TRUE){
        header('location:index.php');
    }
}
}
?>