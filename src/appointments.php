<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список записей</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h2>Список записей в парикмахерскую</h2>
    
    <?php
    require_once "db.php";

    $stmt = $pdo->query("SELECT * FROM appointments ORDER BY id ASC");
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($appointments) > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Имя</th><th>Телефон</th><th>Услуга</th><th>Мастер</th><th>Дата и время</th></tr>';
        
        foreach ($appointments as $appointment) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($appointment['id']) . '</td>';
            echo '<td>' . htmlspecialchars($appointment['name']) . '</td>';
            echo '<td>' . htmlspecialchars($appointment['phone']) . '</td>';
            echo '<td>' . htmlspecialchars($appointment['service']) . '</td>';
            echo '<td>' . htmlspecialchars($appointment['master']) . '</td>';
            echo '<td>' . htmlspecialchars($appointment['datetime']) . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<p>Нет записей в базе данных.</p>';
    }
    ?>
    
    <p><a href="index.php">Вернуться к форме записи</a></p>
</body>
</html>