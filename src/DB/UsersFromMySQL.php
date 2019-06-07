<?php

$mysqlConnection = null;

function getUsers()
{
    openConnection();
    global $mysqlConnection;

    $users = [];
    $result = mysqli_query($mysqlConnection, "SELECT * FROM users");

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    closeConnection();

    return $users;
}

function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user){
        if ($user['id'] == $id){
            return $user;
        }
    }
    return null;
}


/**
 * Saves user in json file and returns new ID
 *
 * @param $data
 * @return int
 */
function createUser($data)
{
    openConnection();
    global $mysqlConnection;

    $name = $data['name'];
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $phone = $data['phone'];
    $website = $data['website'];

    mysqli_query($mysqlConnection, "INSERT INTO users (name,username,password,email,phone,website)
            VALUES ('$name','$username','" . password_hash('$password', PASSWORD_BCRYPT) . "','$email','$phone','$website')");

    closeConnection();
}

function updateUser($data, $id)
{
    openConnection();
    global $mysqlConnection;

    $name = $data['name'];
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $phone = $data['phone'];
    $website = $data['website'];

    mysqli_query($mysqlConnection, "UPDATE users 
    SET name='$name',username='$username',password = '" . password_hash('$password', PASSWORD_BCRYPT) . "',email='$email',phone='$phone',website='$website'
    WHERE id=$id");

    closeConnection();
}

function openConnection()
{
    global $mysqlConnection;
    $servername = "localhost";
    $username = "root";
    $database = "simple_framework";
    $password = "";
    // Create connection
    $mysqlConnection = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$mysqlConnection) {
        die("Connection failed: " . mysqli_connect_error());
    }
}

function closeConnection()
{
    global $mysqlConnection;
    mysqli_close($mysqlConnection);
}
