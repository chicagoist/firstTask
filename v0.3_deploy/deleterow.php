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


            $delete_id = htmlspecialchars($_POST['deleterow']);

            DeleteID::getObject()->delete_row_by_id($delete_id);
            mysqli_close(DeleteID::getObject());

        ?>
    </body>
</html>
