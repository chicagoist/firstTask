<?php
$row_id = htmlspecialchars($_GET['editrow']);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        if ($_GET) {
            echo <<<'ENDOF'
        <form method="post" action="deleterow.php">
            <input type="text" name="deleterow" />
            <input type="submit" value="id УДАЛИТЬ" name='submit' />
        </form>
        <br />
        ENDOF;

            require_once ("Includes/EditRow.php");

            EditRow::getObject()->print_row($row_id);
        } else {
            header('Location: report.html');
        }
        ?>

    </body>
</html>
