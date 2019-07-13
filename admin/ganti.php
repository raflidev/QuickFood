

<form class='mt-2' action="" method="post">
<div class="from-group row">
    
<div class="col-md-6">
    <label>Password lama</label>
    <input type="text"  name="password" class="form-control" placeholder='password lama'>
    </div>
</div>

<div class="from-group row">
    <div class="col-md-6">
    <label>Password baru</label>
    <input type="text" name="pass1" class="form-control" placeholder='password baru'>
    </div>
</div>

<div class="from-group row">
    <div class="col-md-6">
    <label>Ulangi password baru</label>
    <input type="text" name="pass2" class="form-control" placeholder='ulangi password baru'>
    </div>
</div>
<button name='ubah' class='mt-2 px-5 btn btn-primary'>Ganti!</button>
</form>

<?php
if(isset($_POST['ubah'])){
$passlama = $_POST['password'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$sql = "SELECT * FROM login where username='$username' AND password='$passlama'";
$query = mysqli_query($koneksi, $sql);
$num = mysqli_num_rows($query);
if(!$num > 1){
    echo 'salah';
 }
else{
    $sql2 = "UPDATE login SET password='$pass2' where username='$username' ";
    $query2 = mysqli_query($koneksi, $sql2);
    if($query2 == TRUE){?>
        <script>
            alert('password berhasil di ganti');
            document.location='index.php';
        </script>

    <?php }else{?>
        <script>
            alert('password gagal di ganti');
            document.location='index.php';
        </script>
<?php }  } }?>