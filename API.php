<?php
header('Content-Type: text/html; charset=utf-8');

// Параметры подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Подключение не удалось: " . $conn->connect_error);
}

$filePath = 'a.json'; // Используйте относительный путь

if (file_exists($filePath)) {
    $data = json_decode(file_get_contents($filePath), true);

    if (isset($data['type']) && $data['type'] == 'user') {
        // Добавление пользователя
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $unique_id = uniqid();

        $sql = $conn->prepare("INSERT INTO users (first_name, last_name, unique_id) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $first_name, $last_name, $unique_id);

        if ($sql->execute()) {
            echo "Пользователь добавлен успешно. Уникальный ID: " . $unique_id;
        } else {
            echo "Ошибка: " . $sql->error;
        }
        $sql->close();
    } elseif (isset($data['type']) && $data['type'] == 'admin') {
        // Добавление администратора
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $unique_id = uniqid();

        $sql = $conn->prepare("INSERT INTO admins (first_name, last_name, unique_id) VALUES (?, ?, ?)");
        $sql->bind_param("sss", $first_name, $last_name, $unique_id);

        if ($sql->execute()) {
            echo "Администратор добавлен успешно. Уникальный ID: " . $unique_id;
        } else {
            echo "Ошибка: " . $sql->error;
        }
        $sql->close();
    } else {
        echo "Неверный тип запроса";
    }
} else {
    echo "Файл не найден";
}

// Закрытие подключения
$conn->close();
?>
