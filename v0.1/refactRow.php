<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { // зашли ли из формы со страницы нашего сайта через POST
    
    require_once ("Includes/RefactRow.php");
    $row_id = htmlspecialchars($_POST['refactrow']);
    //echo '$row_id = ' . $row_id . "<br />"; // for debag
    
    // Вызываем все данные по id для рефакторинга
    $first_name = RefactRow::getObject()->row_first_name($row_id);
    $last_name = RefactRow::getObject()->row_last_name($row_id);
    $phone_row = RefactRow::getObject()->row_phone($row_id);
    $email_row = RefactRow::getObject()->row_email($row_id);
    $data_row = RefactRow::getObject()->row_data($row_id);
    
} else {
    header('Location: report.html'); // если зашли не со страницы нашего сайта, то переадресация на Главную
}

// заполняем форму данными для их редактирования
echo <<<"ENDOF"
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <form name="refact_row" action="executeUpdateRow.php" method="POST">
        <input type="hidden" name="rowID" value="$row_id" />
               First name : <input type="text" name="first_name"  value="$first_name" /><br />
               Last name  :  <input type="text" name="last_name" value="$last_name"/><br />
               Last name  :  <input type="text" name="phone_row" value="$phone_row"/><br />
               Last name  :  <input type="text" name="email_row" value="$email_row"/><br />
               Last name  :  <input type="text" name="data_row" value="$data_row"/><br />
            <input type="submit" name="saveRow" value="Сохранить Изменения"/>
            
        </form>
        
            </body>
</html>
ENDOF       
?>