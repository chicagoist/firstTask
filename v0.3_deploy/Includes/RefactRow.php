<?php

namespace App\Refactor;

require_once 'Includes/traits/TVarConnect.php';

use App\Traits\TVarConnect;
use App\Edit\EditRow as EditRow;
use mysqli;

class RefactRow extends mysqli
{

    // один экземпляр разделен между всеми экземплярами класса
    private static $object = null;

    // переменные для доступа к БД в трейте
    use TVarConnect;

    // Этот метод должен быть static и должен возвращать экземпляр объекта, если объект
// еще не существует.
    public static function getObject()
    {
        if (!self::$object instanceof self) {
            self::$object = new self;
        }
        return self::$object;
    }

    // Методы clone и wakeup предотвращают внешнее создание копий класса Singleton,
    // таким образом исключая возможность дублирования объектов.
    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        trigger_error('Deserializing is not allowed.', E_USER_ERROR);
    }

    // private constructor
    private function __construct()
    {
        parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        parent::set_charset('utf-8');
    }

    public function row_id($id_row)
    {

        $param = $this->query("SELECT id FROM customers WHERE id=" . $id_row);

        if (!empty($param)) {
            while ($row = $param->fetch_assoc())
            {

                $row_id = $row['id'];
            }
        }
        return $row_id;
    }

    public function row_first_name($id_row)
    {

        $param = $this->query("SELECT first_name FROM customers WHERE id=" . $id_row);

        if (!empty($param)) {
            while ($row = $param->fetch_assoc())
            {

                $first_name = $row['first_name'];
            }
        }
        return $first_name;
    }

    public function row_last_name($id_row)
    {


        $param = $this->query("SELECT last_name FROM customers WHERE id=" . $id_row);

        if (!empty($param)) {
            while ($row = $param->fetch_assoc())
            {

                $last_name = $row['last_name'];
            }
        }
        return $last_name;
    }

    public function row_phone($id_row)
    {

        $param = $this->query("SELECT numberphone FROM customers WHERE id=" . $id_row);

        if (!empty($param)) {
            while ($row = $param->fetch_assoc())
            {

                $phone_row = $row['numberphone'];
            }
        }
        return $phone_row;
    }

    public function row_email($id_row)
    {
        $param = $this->query("SELECT email FROM customers WHERE id=" . $id_row);

        if (!empty($param)) {
            while ($row = $param->fetch_assoc())
            {

                $email_row = $row['email'];
            }
        }
        return $email_row;
    }

    public function row_data($id_row)
    {
        $param = $this->query("SELECT data FROM customers WHERE id=" . $id_row);

        if (!empty($param)) {
            while ($row = $param->fetch_assoc())
            {

                $data_row = $row['data'];
            }
        }
        return $data_row;
    }

    // обновление новыми данными, на основании id
    public function refact_row_by_id($id_row, $fname, $lname, $phone_row, $email_row, $data_row)
    {
        $id = $this->real_escape_string($id_row);
        $first_name = $this->real_escape_string($fname);
        $last_name = $this->real_escape_string($lname);
        $numberphone = $this->real_escape_string($phone_row);
        $email = $this->real_escape_string($email_row);
        $data = $this->real_escape_string($data_row);



        $this->query("UPDATE customers SET first_name='" . $first_name . "', last_name='" . $last_name . "', numberphone='" . $numberphone . "', email='" . $email . "', data='" . $data . "'  WHERE id='" . $id . "'");

        // вывод строки с обновленными данными
        echo "<b>Новые данные:</b><br />";
        EditRow::getObject()->print_row($id_row);
        mysqli_close(EditRow::getObject());
    }

}
