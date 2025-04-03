<?php
require_once "db.php";

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
?>