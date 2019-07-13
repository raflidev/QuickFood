<?php
$no= 1;
$sql = "SELECT * from checkout";
$query= mysqli_query($koneksi, $sql);
?>

<table class='table table-bordered'>
<thead>
<tr>
<th>No</th>
<th>No Pelangan</th>
<th>Waktu</th>
<th>Total</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php 
if(mysqli_num_rows($query) > 0 ){
while($row = mysqli_fetch_array($query)){ ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['id_pembeli'] ?></td>
<td><?= $row['waktu'] ?></td>
<td><?= $row['total'] ?></td>
<td>
<form method="post">
<button name='detail' value='<?= $row['id_pembeli'] ?>' class='btn btn-warning'>Detail</button> | 
<button name='lunas' value='<?= $row['id_pembeli'] ?>' class='btn btn-danger'>Lunas?</button>
</form>
</td>
</tr>
<?php
} }else{ ?>
<tr>
        <td colspan="5" class="text-center">belum ada data!</td>
</tr>
<?php  } ?>
</tbody>
</table>