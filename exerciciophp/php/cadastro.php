<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        $host = 'localhost';
        $db = 'escola_sql';
        $user = 'Felipe';
        $pass = '123456';
        $port = 3307;
        // inclui o arquivo da classe Database que criamos para conectar dentro da pasta php
        require_once 'db.php';
        // instância da classe Database
        $database = new Database($host, $db, $user, $pass, $port);
        // método connect para estabelecer a conexão
        $database->connect();
        // instância PDO para realizar consultas
        $pdo = $database->getConnection();
    ?>
</head>
<body>
<?php
// verifica se os dados foram enviados por GET
if (isset($_GET['nome']) && isset($_GET['idade']) && isset($_GET['email']) && isset($_GET['curso'])){
    //dados enviados pelo formulário
    $nome = htmlspecialchars($_GET['nome']);
    $email = htmlspecialchars($_GET['idade']);
    $idade = htmlspecialchars($_GET['email']);
    $curso = htmlspecialchars($_GET['curso']);

    // mostra os dados
    echo "<h2>Informações recebidas:</h2>";
    echo "<p><strong>Nome:</strong> " . $nome . "<p>";
    echo "<p><strong>E-mail:</strong> " . $idade . "<p>";
    echo "<p><strong>Idade:</strong> " . $email . "<p>";
    echo "<p><strong>Curso:</strong> " . $curso . "<p>";
    // verifica se a variável $pdo está definida e é válida
    // comando SQL para inserir dados nas colunas 'nome', 'idade', 'email' e 'curso' da tabela 'alunos'
    $stmt = $pdo->prepare("INSERT into alunos(nome, idade, email, curso) values('$nome','$email','$idade','$curso');");

    // executa o comando
    $stmt->execute();
} else{
    echo "Nenhum dado foi enviado.";
}
?>