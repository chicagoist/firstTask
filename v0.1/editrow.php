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
        //require_once("Includes/db.php");
        //require_once ("Includes/printdb.php");
        require_once ("Includes/EditRow.php");

        $row_id = htmlspecialchars($_POST['editrow']);

        EditRow::getObject()->print_row($row_id);
        ?>
    </body>
</html>
