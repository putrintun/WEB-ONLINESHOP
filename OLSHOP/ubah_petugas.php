<!doctype html>
<html>
    <head>
        <title>UBAH PETUGAS</title>
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
            $qry_get_petugas=mysqli_query($conn,"SELECT * FROM petugas WHERE id_petugas = '".$_GET['id_petugas']."'");
            $dt_petugas=mysqli_fetch_array($qry_get_petugas);
        ?>
        <div class="login">
            <form action="proses_ubah_petugas.php" method="post" class="form">
                <img src="ASSETS/RANDOM/LOGIN.png" alt="">
                <h2><b>UBAH PETUGAS</b></h2>
                <input type="hidden" name="id_petugas" value="<?=$dt_petugas['id_petugas']?>">
                <div class="input-group">
                    <input type="text" name="nama_petugas" value="<?=$dt_petugas['nama_petugas']?>" required>
                    <label for="nama_petugas">Nama Lengkap</label>
                </div>
                <div class="input-group">
                    <input type="text" name="username" value="<?=$dt_petugas['username']?>" required>
                    <label for="username">Username</label>
                </div>
                <div>
                    <label for="level">Level</label>
                    <select name="level" class="form-control" required>
                        <?php 
                        $arr_level=array('Rendah','M' => 'Menengah','T' => 'Tinggi');
                        foreach ($arr_level as $key_level => $val_level):
                            if($key_level==$dt_petugas['level']){
                                $selek="selected";
                            }else{
                                $selek="";
                            }
                        ?>
                        <option value="<?=$key_level?>"<?=$selek?>><?=$val_level?></option>
                        <?php endforeach ?>
                    </select> <br>
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