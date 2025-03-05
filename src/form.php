<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $service = $_POST['service'] ?? '';
    $master = $_POST['master'] ?? '';
    $datetime = $_POST['datetime'] ?? '';

    if (!empty($name) && !empty($phone) && !empty($service) && !empty($master) && !empty($datetime)) {
        $file = fopen("data.csv", "a");
        fputcsv($file, [$name, $phone, $service, $master, $datetime], ";");
        fclose($file);
        echo "Запись успешно сохранена!";
    } else {
        echo "Ошибка: заполните все поля!";
    }
}
?>
