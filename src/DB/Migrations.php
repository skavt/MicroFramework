<?php

$config = require __DIR__ . '/Config.php';

$servername = $config['host'];
$username = $config['username'];
$password = $config['password'];
$database = $config['database'];

$conn = new PDO("mysql:host=$servername", $username, $password);

try 
{
    $sql = "CREATE DATABASE $database";
    $conn->exec($sql);
    //echo "Database created successfully" . PHP_EOL;
    $conn->query("use $database");

    $sql = "CREATE TABLE users 
    (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        name VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255),
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(50) NOT NULL
    )";
    $conn->exec($sql);

    // $sql = "INSERT INTO users (name, username, password, email, phone, website)
    // VALUES ('John', 'JDoe', '" . password_hash('admin', PASSWORD_BCRYPT) . "', 'admin@example.com', '234-098-234')";

    $conn->exec($sql);
}   
catch (PDOException $e) 
{
    echo $sql . "<br>" . $e->getMessage();
}
