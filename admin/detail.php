<?php
$id = $_POST['detail'];
$no=1;
$sql = "SELECT * FROM pembelian INNER JOIN
	menu ON
	pembelian.id_produk = menu.id
 where pembelian.id_pembeli = $id";
$query = mysqli_query($koneksi, $sql);
?>
<h2>Pelangan no.<?= $id ?></h2>
<table class='table table-bordered'>
<thead>
<tr>
<th>No</th>
<th>Pesanan</th>
<th>jumlah</th>
</tr>
</thead>
<tbody>
<?php while($row = mysqli_fetch_array($query)){ ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['title'] ?></td>
<td><?= $row['jumlah'] ?></td>
</tr>
<?php } ?>
</tbody>
</table>