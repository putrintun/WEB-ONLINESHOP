<!doctype html>
<html lang="en">
    <head>
        <title>LOGIN PETUGAS</title>
        <link href="ASSETS/RANDOM/LOGIN.png" rel="shortcut icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="style_login.css" rel="stylesheet">
    </head>
    <body>
        <div class="login">
            <form action="proses_login_petugas.php" method="post" class="form">
                <img src="ASSETS/RANDOM/LOGIN.png" alt="">
                <h2><b>LOGIN PETUGAS</b></h2>
                <div class="input-group">
                    <input type="text" name="username" id="username" required>
                    <label for="username">Username</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" id="password" required>
                    <label for="password">Password</label>
                </div>
                <center><input type="button" value="Back" onclick="history.back(-1)" class="submit"/>
                <input type="submit" value="login" class="submit"></center> <br>
                <center><p>Don't have an Account ? <a href="tambah_petugas.php">Sign Up</a></p></center>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>