<?php

// Подключение к базе данных
$servername = "localhost";
$login = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);
// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//Количество пользователей, привязанных больше, чем к одной компании.
$sql = "SELECT COUNT(*) AS count
        FROM (
            SELECT user_id
            FROM company_user
            GROUP BY user_id
            HAVING COUNT(DISTINCT company_id) > 1
        ) AS user_companies";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Вывод количества пользователей
    $row = $result->fetch_assoc();
    echo "Количество пользователей, привязанных к более чем одной компании: " . $row["count"];
} else {
    echo "0 результатов";
}




//Компании, в которых состоят только пользователи, не привязанные к другим компаниям.
$sql = "SELECT DISTINCT c.company_id, c.company_name FROM company c
        LEFT JOIN company_users cu ON c.company_id = cu.company_id
        WHERE cu.user_id IS NULL";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Вывод результатов
    while($row = $result->fetch_assoc()) {
        echo "Компания ID: " . $row["company_id"]. " - Название: " . $row["company_name"]. "<br>";
    }
} else {
    echo "Нет компаний, в которых состоят только пользователи, не привязанные к другим компаниям";
}



$conn->close();

?>


<!DOCTYPE html>
<html lang="en";>
<head>
<title>Test bd</title>
<meta charset="utf-8" />
</head>
<body>
</body>
</html>