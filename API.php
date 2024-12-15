<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "myuser";
$password = "mypassword";
$dbname = "mydatabase";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Обработка GET-запроса для получения всех администраторов
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM admins";
    $result = $conn->query($sql);

    $admins = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $admins[] = $row;
        }
    }
    echo json_encode($admins);
}

// Обработка POST-запроса для добавления нового администратора
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $group_name = $data['group_name'];
    $plain_password = $data['password'];
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admins (first_name, last_name, group_name, password) VALUES ('$first_name', '$last_name', '$group_name', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "New record created successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $sql . "<br>" . $conn->error]);
    }
}

$conn->close();
?>
