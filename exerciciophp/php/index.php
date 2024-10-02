<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <h2>Cadastro de Alunos</h2>
        <form action="cadastro.php" method="POST">
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="idade">Idade:</label><br>
            <input type="int" id="idade" name="idade" required><br><br>

            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="curso">Curso:</label><br>
            <input type="text" id="curso" name="curso" required><br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
<style>
table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #2980b9;
        }
        th {
            background-color: #2980b9;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e6f7ff;
        }
</style>
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

    $stmt = $pdo->query("SELECT * FROM alunos"); /*seleciona os dados do banco*/
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h2>Lista de Alunos Cadastrados</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>E-mail</th>
            <th>Curso</th>
        </tr>
        <?php foreach ($alunos as $aluno): ?>
        <tr>
            <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
            <td><?php echo htmlspecialchars($aluno['idade']); ?></td>
            <td><?php echo htmlspecialchars($aluno['email']); ?></td>
            <td><?php echo htmlspecialchars($aluno['curso']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>