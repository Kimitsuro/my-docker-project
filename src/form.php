<?php
$host = 'db';
$dbname = 'mydb';
$user = 'user';
$password = 'password';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $service = $_POST['service'] ?? '';
        $master = $_POST['master'] ?? '';
        $datetime = $_POST['datetime'] ?? '';

        $errors = [];

        if (empty($name)) {
            $errors[] = "Имя обязательно для заполнения.";
        }

        if (empty($phone)) {
            $errors[] = "Телефон обязателен для заполнения.";
        } elseif (!preg_match('/^\d{9}(\d{2})?$/', $phone)) {
            $errors[] = "Номер телефона должен содержать 9 или 11 цифр.";
        }

        if (empty($datetime)) {
            $errors[] = "Дата и время обязательны для заполнения.";
        } else {
            $selectedDateTime = new DateTime($datetime);
            $currentDateTime = new DateTime();
            if ($selectedDateTime < $currentDateTime) {
                $errors[] = "Нельзя записаться на прошедшую дату.";
            }
        }

        if (empty($errors)) {
            $stmt = $pdo->prepare("INSERT INTO appointments (name, phone, service, master, datetime) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $phone, $service, $master, $datetime]);
            
            echo "Запись сохранена! <a href='index.php'>Назад</a>";
        } else {
            foreach ($errors as $error) {
                echo "<p>Ошибка: $error</p>";
            }
            echo "<a href='index.php'>Вернуться к форме</a>";
        }
    }
    else {
        header("Location: index.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Ошибка базы данных. <a href='index.php'>Вернуться</a>";
}
?>