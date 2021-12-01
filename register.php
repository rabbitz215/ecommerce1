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

    .log {
        text-decoration: none;
        color: blue;
    }
</style>

<head>
    <title>D'Borong</title>
</head>

<body>

    <h1>D'BORONG<br />Register Page</h1>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan register</p>

        <form action="p_register.php" method="post">
            <label>Nama</label>
            <input type="text" name="nama" class="form_login" placeholder="Nama .." required="required">

            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password .." required="required">

            <label>Confirm Password</label>
            <input type="password" name="confirm" class="form_login" placeholder="Confirm Password .." required="required">

            <input type="submit" class="tombol_login" value="REGISTER">

            <p>Sudah punya akun ?<a href="index2.php" class="log"> Login</a></p>
        </form>

    </div>


</body>

</html>