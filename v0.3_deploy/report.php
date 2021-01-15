<!DOCTYPE html>



<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Создание MySQL INSERT</title>
    </head>
    <body>
        <h2>Создание MySQL</h2>
        <?php

use App\Database\TestDB;
use App\Show\PrintDB;

error_reporting(E_ALL);

        require_once("Includes/TestDB.php");
        require_once ("Includes/PrintDB.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") { // зашли ли из формы со страницы нашего сайта через POST
            // Передача значений в переменные из Формы
            $first_name = htmlspecialchars($_POST['firstname']);
            $last_name = htmlspecialchars($_POST['lastname']);
            $numberphone = htmlspecialchars($_POST['numberphone']);
            $email = htmlspecialchars($_POST['email']);
            $data = date("d.m.Y G:i:s");
            // если пустые поля в Форме, внести значения по умолчанию
            // в переменные
            if (!$email) {
                $email = htmlspecialchars("mail@mail");
            }
            if (!$first_name) {
                $first_name = htmlspecialchars("Ivan");
            }
            if (!$last_name) {
                $last_name = htmlspecialchars("Pupkin");
            }
            if (!$numberphone) {
                $numberphone = htmlspecialchars("555-55-55");
            }


            $connect = TestDB::getInstance()->create_customer($first_name, $last_name, $numberphone, $email, $data);

            mysqli_close(TestDB::getInstance());
            
            echo 'Thanks for submitting the form.<br />';
            echo "<br />";
            
            
        }
        else {
            header('Location: index.php'); // если зашли не со страницы нашего сайта, то переадресация на Главную
        }
        ?>

        <form method="get" action="editrow.php">
            <label for="editrow">Enter id: </label>
            <input type="text" name="editrow" />

            <input type="submit" value="SUBMIT" name="submit" /><br />
        </form>
        <br /> 

<?php
PrintDB::getObject();
mysqli_close(PrintDB::getObject());
?>


    </body>
</html>
