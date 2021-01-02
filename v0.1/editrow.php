<?php
$row_id = htmlspecialchars($_GET['editrow']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        if ($_GET) { // зашли ли из формы со страницы нашего сайта через GET
            echo <<<'ENDOF'
        <form method="post" action="deleterow.php">
            <input type="text" name="deleterow" />
            <input type="submit" value="id УДАЛИТЬ" name='submit' />
        </form>
        <form method="post" action="refactRow.php">
            <input type="text" name="refactrow" />
            <input type="submit" value="id РЕДАКТИРОВАТЬ" name='submit' />
        </form>
        <br />
        ENDOF;

            require_once ("Includes/EditRow.php");

            if(!empty(EditRow::getObject()->print_row($row_id))){ // если строка есть, то
                EditRow::getObject()->print_row($row_id); // распечатать данные
            }else {
            header('Location: report.html'); // иначе, переадресация на Главную 
        }
            
        } else {
            header('Location: report.html'); // если зашли не со страницы нашего сайта, то переадресация на Главную
        }
        ?>

    </body>
</html>
