<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        use App\Delete\DeleteID;
        require_once ("Includes/EditRow.php");
        require_once ("Includes/DeleteID.php");


        if ($_SERVER["REQUEST_METHOD"] == "POST") { // зашли ли из формы со страницы нашего сайта через POST
            $delete_id = htmlspecialchars($_POST['deleterow']);

            DeleteID::getObject()->delete_row_by_id($delete_id);
        } else {
            header('Location: report.html'); // если зашли не со страницы нашего сайта, то переадресация на Главную
        }
        ?>
    </body>
</html>
