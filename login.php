<!DOCTYPE html>
<html>
<style type="text/css">
    body {
        font-family: sans-serif;
        background: #ebf9fb;
    }

    h1 {
        text-align: center;
        /*ketebalan font*/
        font-weight: 300;
    }

    .tulisan_login {
        text-align: center;
        /*membuat semua huruf menjadi kapital*/
        text-transform: uppercase;
    }

    .kotak_login {
        width: 350px;
        background: white;
        /*meletakkan form ke tengah*/
        margin: 80px auto;
        padding: 30px 20px;
        box-shadow: 0px 0px 100px 4px #d6d6d6;
    }

    label {
        font-size: 11pt;
    }

    .form_login {
        /*membuat lebar form penuh*/
        box-sizing: border-box;
        width: 100%;
        padding: 10px;
        font-size: 11pt;
        margin-bottom: 20px;
    }

    .tombol_login {
        background: #2aa7e2;
        color: white;
        font-size: 11pt;
        width: 100%;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
        cursor: pointer;
        text-decoration: none;
    }

    .reg {
        margin: 0px;
        padding: 0px;
        position: fixed;
        color: blue;
        margin-left: 0.5rem;
        font-size: 11pt;
        width: 310px;
        text-decoration: none;
    }

    .link {
        color: #232323;
        text-decoration: none;
        font-size: 10pt;
    }

    .alert {
        background: #e44e4e;
        color: white;
        padding: 10px;
        text-align: center;
        border: 1px solid #b32929;
    }
</style>
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

<head>
    <title>D'Borong</title>
</head>

<body>

    <h1>D'BORONG<br />Login Page</h1>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo '<script LANGUAGE="JavaScript">
			alert("Username/Password Salah")
			window.location.href="#";
			</script>';
        }
    }
    ?>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>

        <form action="cek_login.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password .." required="required">

            <input type="submit" class="tombol_login" value="LOGIN"><br>
            <br />
            <p>Tidak punya account ? <a href="register.php" class="reg">Daftar</a></p>
            <!-- <a href="register.php" class="tombol_login">REGISTER</a> -->
        </form>

        
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="alert alert-success" role="alert">
                <h5>LOGIN INFO</h5>
                <b>Admin</b><br>
                Username : admin <br> Password : admin <br>
                <b>Member</b><br>
                Username : galang21 <br> Password : qwerty
            </div>
        </div>
    </div>

</body>

</html>