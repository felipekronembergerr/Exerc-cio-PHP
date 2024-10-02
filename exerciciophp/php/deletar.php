<?php 
$host = 'localhost';
$db = 'escola_sql';
$user = 'Felipe';
$pass = '123456';
$port = 3307;

// inclui o arquivo da classe Database
require_once 'db.php';
$database = new Database($host, $db, $user, $pass, $port);
$database->connect();
$pdo = $database->getConnection();

// verifica se o ID foi passado pela URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // converte para inteiro

    // comando SQL para deletar o aluno
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = :id");
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Aluno excluído com sucesso.";
    } else {
        echo "Erro ao excluir aluno.";
    }
} else {
    echo "ID não fornecido.";
}
?>
<a href="cadastro.php">Voltar para a lista de alunos</a>
