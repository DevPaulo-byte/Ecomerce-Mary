<?php

include_once '../config/config.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
    <!-- style -->
    <link rel="shortcut icon" href="../img/logo/logo.png" type="image/x-icon" windth="16" height="16">
    <link rel="stylesheet" href="../css/login.css?v=<?php echo time(); ?>">
    <!-- style end -->

</head>

<body>


    <div class="wrapper">

        <div class="login-box">

            <div class="login-header">
                <span>Login</span>
            </div>

            <div class="row" id="div-error" style="display: none;">

                <div class=" col-sm-12">
                    <div class="alert alert-danger" id="error-message" role="alert">
                        A simple danger alert—check it out!
                    </div>
                </div>
            </div>


            <form action="../controllers/userLogin.php" method="post" id="form-login">

                <div class="input-box">
                    <input type="email" id="user" class="input-field" name="email" required autocomplete="username">
                    <label for="user" class="label">Email</label>
                    <i class="bx bx-user icon"></i>
                </div>

                <div class="input-box">
                    <input type="password" id="password" class="input-field" name="password" required
                        autocomplete="current-password">
                    <label for="pass" class="label">Senha</label>
                    <i class="bx bx-lock-alt icon"></i>
                </div>

                <div class="remember-pass">

                    <div class="remember-me">
                        <input type="checkbox" id="remember">
                        <label for="remember">Lembrar senha</label>
                    </div>

                    <div class="forgot">
                        <a href="#">Esqueci Minha Senha</a>
                    </div>

                </div>

                <div class="input-box">
                    <input type="submit" class="input-submit" value="Login">
                </div>

                <div class="register">
                    <span>Não Tem Uma Conta? <a href="../pages/register.php">Registrar</a></span>
                </div>

            </form>

        </div>


    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js"
        integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous">
    </script>



    <script src="../js/login.js"></script>
</body>



</html>
