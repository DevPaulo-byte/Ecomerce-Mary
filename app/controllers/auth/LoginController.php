<?php

// Inclui o arquivo de conexão com o banco de dados e inicia sessão
include_once '../../../config/db.php';

// Define o tipo de conteúdo da resposta como JSON com codificação UTF-8
header('Content-Type: application/json; charset=utf-8');

// Inicializa um array para montar a resposta que será enviada ao front-end
$response = [];

try {
    // Garante que a requisição foi feita via método POST (evita acesso indevido via GET ou outros)
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception("Método inválido");
    }

    // Verifica se o campo 'email' foi enviado no POST e não está vazio
    if (empty($_POST['email'])) {
        throw new Exception("Informe o email");
    }
    // Remove espaços em branco no início e fim do email
    $email = trim($_POST['email']);
    // Valida o formato do email para garantir que é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Email inválido");
    }

    // Verifica se o campo 'password' foi enviado no POST e não está vazio
    if (empty($_POST['password'])) {
        throw new Exception("Informe a senha");
    }
    // Remove espaços em branco no início e fim da senha
    $password = trim($_POST['password']);

    // Inicializa controle de tentativas de login na sessão, se não existir
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['last_attempt_time'] = time();
    }

    // Verifica se já houve 7 ou mais tentativas em menos de 5 minutos (300 segundos)
    if ($_SESSION['login_attempts'] >= 7 && (time() - $_SESSION['last_attempt_time']) < 300) {
        throw new Exception("Tente novamente em 5 minutos.");
    } elseif ((time() - $_SESSION['last_attempt_time']) > 300) {
        $_SESSION['login_attempts'] = 0;
    }

    // Prepara a consulta segura para buscar o usuário pelo email, prevenindo SQL Injection
    $query = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o email existe no banco de dados
    if ($result->num_rows === 0) {
        // Incrementa o contador de tentativas e atualiza o horário da última tentativa
        $_SESSION['login_attempts']++;
        $_SESSION['last_attempt_time'] = time();
        throw new Exception("Email não existe");
    }

    // Obtém os dados do usuário encontrado
    $user = $result->fetch_object();

    // Verifica se a senha fornecida corresponde à senha armazenada (hash com password_hash)
    if (!password_verify($password, $user->password)) {
        // Incrementa o contador de tentativas e atualiza o horário da última tentativa
        $_SESSION['login_attempts']++;
        $_SESSION['last_attempt_time'] = time();
        throw new Exception("Senha incorreta");
    }

    // Regenera o ID da sessão para prevenir ataques de fixação de sessão (melhora segurança)
    session_regenerate_id(true);

    // Salva informações do usuário na sessão para manter o estado de login
    $_SESSION['userLogged'] = true;
    $_SESSION['userId'] = $user->id;
    $_SESSION['userName'] = $user->name;

    // Reseta o contador de tentativas após login válido
    $_SESSION['login_attempts'] = 0;

    // Prepara a resposta JSON de sucesso com dados básicos do usuário
    $response = [
        'status' => true,
        'message' => 'Login realizado com sucesso',
        'user' => [
            'id' => $user->id,
            'name' => $user->name
        ]
    ];

    // Fecha o statement antes de enviar a resposta
    $stmt->close();

    // Fecha a conexão com o banco de dados
    $db->close();
} catch (Exception $ex) {
    // Caso ocorra um erro, tentamos fechar recursos se estiverem abertos
    if (isset($stmt) && $stmt instanceof mysqli_stmt) {
        $stmt->close();
    }
    if (isset($db) && $db instanceof mysqli) {
        $db->close();
    }

    // Em caso de erro, prepara a resposta JSON com status false e mensagem do erro
    $response = [
        'status' => false,
        'message' => $ex->getMessage()
    ];
}

// Envia a resposta JSON para o front-end
echo json_encode($response);

// Finaliza o script
exit();
