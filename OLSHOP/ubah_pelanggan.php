<!doctype html>
<html>
    <head>
        <title>UBAH PELANGGAN</title>
        <link href="ASSETS/RANDOM/LOGIN.png" rel="shortcut icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="style_login.css" rel="stylesheet">
        <style>
            .login{
                height: 130vh;
                width: 100vw;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <?php
            include "koneksi.php";
            $qry_get_pelanggan=mysqli_query($conn,"SELECT * FROM pelanggan WHERE id_pelanggan = '".$_GET['id_pelanggan']."'");
            $dt_pelanggan=mysqli_fetch_array($qry_get_pelanggan);
        ?>
        <div class="login">
            <form action="proses_ubah_pelanggan.php" method="post" class="form">
                <img src="ASSETS/RANDOM/LOGIN.png" alt="">
                <h2><b>UBAH PELANGGAN</b></h2>
                <input type="hidden" name="id_pelanggan" value="<?=$dt_pelanggan['id_pelanggan']?>">
                <div class="input-group">
                    <input type="text" name="nama_pelanggan" value="<?=$dt_pelanggan['nama_pelanggan']?>" required>
                    <label for="nama_pelanggan">Nama Lengkap</label>
                </div>
                <div class="input-group">
                    <input type="text" name="username" value="<?=$dt_pelanggan['username']?>" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-group">
                    <input type="text" name="alamat" value="<?=$dt_pelanggan['alamat']?>" required>
                    <label for="alamat">Alamat</label>
                </div>
                <div class="input-group">
                    <input type="tel" name="telp" value="<?=$dt_pelanggan['telp']?>" required>
                    <label for="telp">Nomor Telp</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Password</label>
                </div>
                <center><button onclick="history.back(-1)" class="submit">BACK</button>
                <input type="submit" value="UBAH" class="submit"></center>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>