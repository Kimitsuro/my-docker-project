<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Запись в парикмахерскую</title>
</head>
<body>
    <h2>Форма записи</h2>
    <form action="form.php" method="post">
        <label>Имя: <input type="text" name="name" required></label><br>
        <label>Телефон: <input type="text" name="phone" required></label><br>
        <label>Выберите услугу:
            <select name="service">
                <option value="Стрижка">Стрижка</option>
                <option value="Окрашивание">Окрашивание</option>
                <option value="Укладка">Укладка</option>
            </select>
        </label><br>
        <label>Выберите мастера:
            <select name="master">
                <option value="Анна">Анна</option>
                <option value="Иван">Иван</option>
                <option value="Мария">Мария</option>
            </select>
        </label><br>
        <label>Дата и время: <input type="datetime-local" name="datetime" required></label><br>
        <input type="submit" value="Записаться">
    </form>
</body>
</html>
