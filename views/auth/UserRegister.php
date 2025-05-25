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
    <title>Registrar</title>

    <!-- style -->
    <link rel="stylesheet" href="../css/register.css?v=<?php echo time(); ?>">
    <!-- style end -->

</head>

<body>

    <div class="wrapper">

        <div class="register-box">

            <div class="register-header">
                <span>Registrar</span>
            </div>

            <!-- Nome -->
            <div class="input-box">
                <input type="text" id="user" class="input-field" name="name" required>
                <label for="name" class="label">Nome</label>
                <i class="bx bx-user icon"></i>
            </div>

            <!-- Gênero -->
            <div class="input-radio">
                <p>Gênero:</p>
                <input type="radio" name="sex" id="masculino" class="input-sex" value="Masculino" required>
                <label for="masculino">Masculino</label>

                <input type="radio" name="sex" id="feminino" class="input-sex" value="Feminino">
                <label for="feminino">Feminino</label>

                <input type="radio" name="sex" id="outros" class="input-sex" value="Outros">
                <label for="outros">Outros</label>
            </div>

            <!-- Aniversário -->
            <div class="input-date">
                <label for="date_birth" class="date_birth">Data de Nascimento :</label>
                <input type="date" id="date_birth" class="date_birth" name="date_birth" required>
            </div>

            <!-- Email -->
            <div class="input-box">
                <input type="email" id="email" class="input-field" name="email" required>
                <label for="email" class="label">Email</label>
                <i class="bx bx-envelope icon"></i>
            </div>

            <!-- Telefone -->
            <div class="input-box">
                <input type="tel" id="phone" class="input-field" name="phone" required>
                <label for="phone" class="label">Telefone</label>
                <i class="bx bx-phone icon"></i>
            </div>

            <!-- Endereço -->
            <div class="input-box">
                <input type="text" id="address" class="input-field" name="address" required>
                <label for="address" class="label">Endereço</label>
                <i class="bx bx-home icon"></i>
            </div>

            <!-- Senha -->
            <div class="input-box">
                <input type="password" id="password" class="input-field" name="password" required>
                <label for="password" class="label">Senha</label>
                <i class="bx bx-lock-alt icon"></i>
            </div>

            <!-- Confirmar senha -->
            <div class="input-box">
                <input type="password" id="confirm_password" class="input-field" name="confirm_password" required>
                <label for="confirm_password" class="label">Confirmar Senha</label>
                <i class="bx bx-lock-alt icon"></i>
            </div>

            <div class="input-box">
                <input type="submit" name="submit" class="input-submit" value="Registrar">
            </div>

            <div class="register">
                <span>Já tem uma conta? <a href="../pages/login.php">Login</a></span>
            </div>

            </form>

        </div>

    </div>

    <script src="../js/register.js"></script>
</body>

</html>
