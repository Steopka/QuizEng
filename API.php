<?php
header('Content-Type: application/json');

// Параметры подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admins_and_users";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die(json_encode(["error" => "Подключение не удалось: " . $conn->connect_error]));
}

// Получение данных из запроса
$data = json_decode(file_get_contents('.json'), true);

// Определение типа запроса
$request_type = $_SERVER['REQUEST_METHOD'];

if ($request_type == 'POST') {
    if (isset($data['type']) && $data['type'] == 'user') {
        // Добавление пользователя
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $unique_id = uniqid();

        $sql = "INSERT INTO users (first_name, last_name, unique_id) VALUES ('$first_name', '$last_name', '$unique_id')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Пользователь добавлен успешно", "unique_id" => $unique_id]);
        } else {
            echo json_encode(["error" => "Ошибка: " . $sql . "<br>" . $conn->error]);
        }
    } elseif (isset($data['type']) && $data['type'] == 'admin') {
        // Добавление администратора
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $unique_id = uniqid();

        $sql = "INSERT INTO admins (first_name, last_name, unique_id) VALUES ('$first_name', '$last_name', '$unique_id')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Администратор добавлен успешно", "unique_id" => $unique_id]);
        } else {
            echo json_encode(["error" => "Ошибка: " . $sql . "<br>" . $conn->error]);
        }
    } else {
        echo json_encode(["error" => "Неверный тип запроса"]);
    }
} else {
    echo json_encode(["error" => "Метод запроса не поддерживается"]);
}

// Закрытие подключения
$conn->close();
?>