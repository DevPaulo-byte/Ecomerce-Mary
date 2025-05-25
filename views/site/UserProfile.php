<?php include_once '../config/config.php'; ?>

<?php
if (!isset($_SESSION['userLogged'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>

<body>
    <div class="profile_content">
        <h1>Seja bem vindo,<?= $_SESSION['userName']?>.</h1>
    </div>

</body>

</html>
