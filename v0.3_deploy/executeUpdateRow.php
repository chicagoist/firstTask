<?php

use App\Refactor\RefactRow;

if ($_SERVER["REQUEST_METHOD"] == "POST") {// зашли ли из формы со страницы нашего сайта через POST

    require_once ("Includes/RefactRow.php");
    require_once ("Includes/EditRow.php");
    
    $id_row = htmlspecialchars($_POST['rowID']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $numberphone = htmlspecialchars($_POST['phone_row']);
    $email = htmlspecialchars($_POST['email_row']);
    $data = htmlspecialchars($_POST['data_row']);
    
    // обращаемся к статическому объекту и вызываем функцию refact_row_by_id класса RefactRow
    // обращаемся к MySQl UPDATE IGNORE customers SET ...... обновляем наши данные
    // из функции вызываем функцию print_row класса EditRow и печатаем новые данные по id
    RefactRow::getObject()->refact_row_by_id($id_row,$first_name,$last_name,$numberphone,$email,$data);
    mysqli_close(RefactRow::getObject());
} else {
    header('Location: index.php');// если зашли не со страницы нашего сайта, то переадресация на Главную
}

