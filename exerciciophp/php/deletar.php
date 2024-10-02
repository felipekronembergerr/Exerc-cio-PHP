<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
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
        echo "<p class='success'>Aluno excluído com sucesso.</p>";
    } else {
        echo "<p class='error'>Erro ao excluir aluno.</p>";
    }
} else {
    echo "<p class='error'>ID não fornecido.</p>";
}
?>
<a href="index.php" class="btn-voltar">Voltar para a lista de alunos.</a>