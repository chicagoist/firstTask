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
        require_once ("Includes/EditRow.php");
        require_once ("Includes/DeleteID.php");


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $delete_id = htmlspecialchars($_POST['deleterow']);

            DeleteID::getObject()->delete_row_by_id($delete_id);
        } else {
            header('Location: report.html');
        }
        ?>
    </body>
</html>
