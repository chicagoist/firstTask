<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Создание MySQL INSERT</title>
    </head>
    <body>
        <h2>Создание MySQL</h2>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);


        /*
          Использовал для работы над скриптом:
          1. Книга "Head First PHP", Michael Morrison
          2. Книга "PHP 7", Симдянов
          3. Сайт stackoverflow.com
         * 
         */


        require_once("Includes/db.php");
        require_once ("Includes/printdb.php");


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


        $dbconnect = TestDB::getInstance()->create_customer($first_name, $last_name, $numberphone, $email, $data);
        
        echo 'Thanks for submitting the form.<br />';
        echo "<br />";
        
        
        $printTable = PrintDB::getObject();
        
        ?>


    </body>
</html>
