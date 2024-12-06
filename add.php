<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO tasks (title, description) VALUES (:title, :description)");
    $stmt->execute(['title' => $title, 'description' => $description]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Adicionar Tarefa</title>
</head>
<body>
    <h1>Adicionar Tarefa</h1>
    <form method="post">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Descrição:</label>
        <textarea id="description" name="description"></textarea>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
