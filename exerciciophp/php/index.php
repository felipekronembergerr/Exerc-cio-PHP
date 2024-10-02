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

            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>
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
        <th>Ações</th>
    </tr>
    <?php foreach ($alunos as $aluno): ?>
    <tr>
        <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
        <td><?php echo htmlspecialchars($aluno['idade']); ?></td>
        <td><?php echo htmlspecialchars($aluno['email']); ?></td>
        <td><?php echo htmlspecialchars($aluno['curso']); ?></td>
        <td>
            <a href="deletar.php?id=<?php echo $aluno['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a> <!--se certifica que o usuário deseja excluir os dados por meio de um pop up-->
        </td> 
        
    </tr>
    <?php endforeach; ?>
</table>