<?php
$username = $_SESSION["username"];
$sql = "SELECT * FROM login where username='$username'";
$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($query);

?>

<form class='my-3'>
<h2>Profile</h2>
  <button type="submit" class="btn btn-primary " name='ganti'>Ganti Password</button>
  <button type="submit" class="btn btn-warning" name='level'>Ganti Level</button>
</form>

