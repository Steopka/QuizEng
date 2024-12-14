<?php
$servername = "localhost";
$username = "myuser";
$password = "mypassword";
$dbname = "admins.sql";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Данные для вставки
$first_name = "John";
$last_name = "Doe";
$group_name = "AdminGroup";
$plain_password = "mysecurepassword";

// Хеширование пароля
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

// Вставка данных в таблицу
$sql = "INSERT INTO admins (first_name, last_name, group_name, password) VALUES ('$first_name', '$last_name', '$group_name', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
