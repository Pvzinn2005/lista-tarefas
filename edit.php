<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = :id");
$stmt->execute(['id' => $id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $stmt = $pdo->prepare("UPDATE tasks SET title = :title, description = :description, status = :status WHERE id = :id");
    $stmt->execute(['title' => $title, 'description' => $description, 'status' => $status, 'id' => $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <form method="post">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
        <label for="description">Descrição:</label>
        <textarea id="description" name="description"><?= htmlspecialchars($task['description']) ?></textarea>
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Pendente" <?= $task['status'] === 'Pendente' ? 'selected' : '' ?>>Pendente</option>
            <option value="Concluído" <?= $task['status'] === 'Concluído' ? 'selected' : '' ?>>Concluído</option>
        </select>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
