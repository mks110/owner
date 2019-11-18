<!DOCTYPE html>
<html>
<head>
    <title>form login</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <h1>Selamat Datang di Login Page</h1>
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan']=="gagal"){
        echo "<div class='alert'>Username password Salah!</div>";
    }
}
?>
<div class="kotak_login">
<p class="tulisan_login">Silahkan Login</p>

<form action="cek_login.php" method="post">

<label>Username</label>
<input type="text" name="username" class="form_login" placeholder="username.."required="required">

<label>Password</label>
<input type="password" name="password" class="form_login" placeholder="password.."equired="required">

<input type="submit" class="tombol_login" value="login" >
<br/>
<br/>
<center>
<a class="link" href="">kembali</a>
</center>
</form>
</div>
</body>
</html>