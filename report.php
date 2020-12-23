<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Создание MySQL INSERT</title>
    </head>
    <body>
        <h2>Создание MySQL</h2>
        <?php
        /*
          Использовал для работы над скриптом:
          1. Книга "Head First PHP", Michael Morrison
          2. Книга "PHP 7", Симдянов
          3. Сайт stackoverflow.com
         * 
         */
        

        error_reporting(E_ALL);
        ini_set('display_errors', 1);


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

        // Данные длдя доступа к БД
        $hostname = "localhost";
        $username = "пользователь_базы";
        $password = "пароль к MySQL";
        $db = "testDB"; // уже созданная вручную в консоли БД
        
        // Вывод ошибок для дебага во время работы с БД
        //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT */);

        $dbconnect = mysqli_connect($hostname, $username, $password, $db);
        //Локализация данных БД
        mysqli_set_charset($dbconnect, "utf8mb4");
        /*
          Блок для дебага во время работы над задачей
          if (!$dbconnect) {
          print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error() . "<br />");
          } else {
          print("Соединение установлено успешно <br />");
          }
         */

        //Скрипт создания таблицы customers в таблице testDB
        $create_table = "CREATE TABLE customers ( id INT(11) NOT NULL "
                . "AUTO_INCREMENT PRIMARY KEY, "
                . "first_name TINYTEXT, "
                . "last_name TINYTEXT, "
                . "numberphone VARCHAR(20), "
                . "email TINYTEXT,"
                . "data VARCHAR(20) )";

        //Создание таблицы, если её не было
        $table_query = mysqli_query($dbconnect, $create_table);
        /*
         * Блок кода для дебага во время работы с БД
         *
          if (!$table_query) {
          print('Error querying database. НЕТ ТАБЛИЦЫ' . "<br />");
          } else {
          print("Таблица customers существует<br />");
          }
         * 
         */


        // Скрипт для на полнение строк в таблице customers
        $query = "INSERT INTO customers (first_name, last_name, numberphone, "
                . "email, data) "
                . "VALUES ('" . $first_name . "', '" . $last_name . "', "
                . "'" . $numberphone . "', '" . $email . "', '" . $data . "')";



        // Сам скрипт наполнения таблицы customers в БД testDB
        $result = mysqli_query($dbconnect, $query);
        /* Код для дебага во время работы над таблицей в БД
          if (!$result) {
          print('Error Insert table' . "<br />");
          } else {
          print("INSERT OK?<br />");
          }
         */


        // закрытие доступа к БД
        mysqli_close($dbconnect);



        echo 'Thanks for submitting the form.<br />';
        echo "<br />";
        /*
         Отображение полей, созданной БД
         */
        // Работа над ошибками во время дебага
        //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT */);
        
        // Попробовал доступ к БД через классы (тяжелее далось)
        $conn = new mysqli($hostname, $username, $password, $db)
                or die('Невозможно открыть базу');

        // Формируем запрос из таблицы с именем customers
        $sql = "SELECT * FROM customers";
        $result_text = $conn->query($sql);
        // В цикле перебираем все записи таблицы и выводим их
        while ($row = $result_text->fetch_assoc()) {
            // Оператором echo выводим на экран поля таблицы name_blog и text_blog
            echo '<b>Имя : </b>' . $row['first_name'] . ", ";
            echo '<b>Фамилия : </b>' . $row['last_name'] . ", ";
            echo '<b>Номер телефона : </b>' . $row['numberphone'] . ", ";
            echo '<b>E-mail : </b>' . $row['email'] . ", ";
            echo '<b>Дата посещения : </b>' . $row['data'];
            echo "<br />";
        }

        // Закрытие доступа к БД
        mysqli_close($conn);
        
        /*
         mysqldump -u legioner -p testDB --events --triggers --routines > testDB.sql
         */
        
        
        ?>

 
    </body>
</html>
