<?php

class Database
{
    private $servername;
    private $username;
    private $password;
    private $database;

    private $connection;

    public function __construct()
    {
        $config = require __DIR__ . '/Config.php';
        $this->servername = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->database = $config['database'];
        $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    public function loginUser($email, $password)
    {
        $stmt = $this->getConnection()
            ->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        if (!$user || !password_verify($password, $user['password'])){
            return false;
        }
        else if (empty($email) && empty($password)) {
        $errorExist = "Fields Are Empty";
        return false;
        }
        $_SESSION['currentUser'] = $user;
        return true;
    }

    public function changeMail($email)
    {
        $name = currentUser()['full_name'];
        $stmt = $this->getConnection()
            ->prepare("UPDATE users SET email = ? WHERE full_name = ?");
        $stmt->execute([$email, $name]);
        return true;
    }
    public function changeName($name)
    {
        $email = currentUser()['email'];
        $stmt = $this->getConnection()
            ->prepare("UPDATE users SET full_name = ? WHERE email = ?");
        $stmt->execute([$name, $email]);
        return true;
    }
    public function deleteUser()
    {
        $id = currentUser()['id'];
        $stmt = $this->getConnection()
            ->prepare("DELETE FROM `users` WHERE `users`.`id` = ?");
        $stmt->execute([$id]);
        return true;
    }

    // Addon
    public function UserExist($email)
    {
        $stmt = $this->getConnection()
            ->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetchColumn();
        if ($user) {
            return true;
        }
        else return false;
    }

    public function RegisterUser($name,$email,$password)
    {
        $stmt = $this-> getConnection()
            ->prepare("INSERT INTO users (name, username, password, email, phone)
            VALUES (?,?,?,?)");
        if (empty($name) && empty($email) && empty($password)) {
            $errorExist = "Fields Are Empty";
            return false;
        }
        else if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
            $errorExist = "Name Contains Illegal Characters";
            return false;
        }
        else if (strlen($password) < 5 || strlen($password) > 15) {
            $errorExist = "That Length Of Password Is Not Allowed";
            return false;
        }
        else if (strlen($name) > 25) {
            $errorExist = "Your Account Name Is To Long";
            return false;
        }
        else if ($this->UserExist($email) !== false) {
            $errorExist = "Error Already Exist Please Login With Your Account";
            return false;
        }
        else $stmt->execute([$name, $email, password_hash($password, PASSWORD_BCRYPT)]);
        return true;

    }
}
