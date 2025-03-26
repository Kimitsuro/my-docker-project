<?php
$host = 'db';
$dbname = 'mydb';
$user = 'user';
$password = 'password';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (($handle = fopen("data.csv", "r")) !== FALSE) {
        $stmt = $pdo->prepare("INSERT INTO appointments (name, phone, service, master, datetime) VALUES (?, ?, ?, ?, ?)");
        
        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
            $stmt->execute($data);
        }
        
        fclose($handle);
        echo "Данные из CSV успешно перенесены в базу данных!";
    } else {
        echo "Не удалось открыть файл data.csv";
    }
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>