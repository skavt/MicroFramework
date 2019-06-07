<?php

include '../view/Header.php';
require_once '../src/DB/UsersFromMySQL.php';

if (isset($_POST['name']))
{
    $errors = 0;
    if (empty($_POST['name']))
    {
        $emptyName = " Name field can't be empty ";
        $errors ++;
    }
    if (empty($_POST['username']))
    {
        $emptyUsername = " Username field can't be empty ";
        $errors ++;
    }
    // if (empty($_POST['password']))
    // {
    //     $emptyPassword = " Password field can't be empty ";
    //     $errors ++;
    // }
    if (empty($_POST['email']))
    {
        $emptyEmail = " Email field can't be empty ";
        $errors ++;
    }
    if (empty($_POST['phone']))
    {
        $emptyPhone = " Phone field can't be empty ";
        $errors ++;
    }
    if (empty($_POST['website']))
    {
        $emptyWebsite = " Website field can't be empty ";
        $errors ++;
    }
    if (strlen($_POST['name']) < 2 or strlen($_POST['name']) > 30) 
    {
        $errorName = " Name's size must be between 2 and 30 symbols  ";
        $errors ++;
    }
    if (strlen($_POST['username']) < 4 or strlen($_POST['username']) > 20) 
    {
        $errorUsername = " Username's size must be between 4 and 20 symbols  ";
        $errors ++;
    }    
    // if (strlen($_POST['password']) < 4 or strlen($_POST['password']) > 20) 
    // {
    //     $errorPassword = " Password's size must be between 4 and 20 symbols  ";
    //     $errors ++;
    // }
    if (strlen($_POST['email']) <5 or strlen($_POST['email']) > 30) 
    {
        $errorEmail = " Email's size must be between 5 and 30 symbols  ";
        $errors ++;
    }
    if (strlen($_POST['phone']) < 8 or strlen($_POST['phone']) > 13) 
    {
        $errorPhone = " Please enter valid phone number  ";
        $errors ++;
    }
    if (strlen($_POST['website']) <4 or strlen($_POST['name']) > 25) 
    {
        $errorWebsite = " Please enter valid website name ";
        $errors ++;
    }
    if ($errors == 0) 
    {
        if (!empty($_POST['id']) && empty($errors)) 
        {
            $userId = $_POST['id'];
            updateUser($_POST, $userId);
        } 
        else 
        {
            createUser($_POST);
        }

        header('Location: ../index.php');
    }
}

?>

<?php include '../view/Form/RegForm.php' ?>

