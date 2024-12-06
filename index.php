<?php
include 'db.php';

$query = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projeto CRUD</title>
</head>
<body>
    <h1>Lista de Tarefas</h1>
    <a href="add.php" class="btn">Adicionar Tarefa</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $task['id'] ?></td>
                    <td><?= htmlspecialchars($task['title']) ?></td>
                    <td><?= htmlspecialchars($task['description']) ?></td>
                    <td><?= $task['status'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $task['id'] ?>">Editar</a>
                        <a href="delete.php?id=<?= $task['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
