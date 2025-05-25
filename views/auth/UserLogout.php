<?php

include_once '../config/config.php';

// Remove dados de sessão específicos (se houver)
unset($_SESSION["userLogged"]);
unset($_SESSION["userId"]);
unset($_SESSION["userName"]);

// Destroi a sessão
session_destroy();

// Remove o cookie de sessão do navegador
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),      // geralmente 'PHPSESSID'
        '',                  // valor vazio
        time() - 42000,      // expira no passado
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Redireciona para a tela de login
header("Location: login.php");
exit; //encerra o script após o redirecionamento
