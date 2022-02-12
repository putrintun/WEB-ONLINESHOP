<!doctype html>
<html lang="en">
    <head>
        <title>SIGN UP PELANGGAN</title>
        <link href="ASSETS/RANDOM/LOGIN.png" rel="shortcut icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="style_login.css" rel="stylesheet">
        <style>
            .login{
                height: 150.2vh;
                width: 100vw;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <div class="login">
            <form action="proses_tambah_pelanggan.php" method="post" class="form" enctype="multipart/form-data">
                <img src="ASSETS/RANDOM/LOGIN.png" alt="">
                <h2><b>SIGN UP PELANGGAN</b></h2>
                <div class="input-group">
                    <input type="text" name="nama_pelanggan" required>
                    <label for="nama_pelanggan">Nama Lengkap</label>
                </div>
                <div class="input-group">
                    <input type="text" name="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-group">
                    <input type="text" name="alamat" rows="2" required>
                    <label for="alamat">Alamat</label>
                </div>
                <div class="input-group">
                    <input type="tel" name="telp" required>
                    <label for="telp">Nomor Telp</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Password</label>
                </div>
                <div>
                    <label for="file">Foto Anda</label>
                    <input type="file" name="foto_pelanggan" class="form-control">
                </div> <br>
                <center><button onclick="history.back(-1)" class="submit">BACK</button>
                <input type="submit" value="SIGN UP" class="submit"></center> <br>
                <center><p>Already have an Account ? <a href="login_pelanggan.php">Log In</a></p></center>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>