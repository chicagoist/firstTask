<?php

namespace App\Edit;

require_once 'Includes/traits/TVarConnect.php';

use App\Traits\TVarConnect;
use mysqli;

class EditRow extends mysqli
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

    //функция вывода данных строки по id
    public function print_row($id_row)
    {

        $param = $this->query("SELECT id, first_name, last_name, numberphone, email, data FROM customers WHERE id=" . $id_row);

        if (!empty($param)) {
            while ($row = $param->fetch_assoc())
            {
                // Оператором echo выводим на экран поля таблицы name_blog и text_blog
                echo '<b>id : </b>' . $row['id'] . " ";
                echo '<b>Имя : </b>' . $row['first_name'] . ", ";
                echo '<b>Фамилия : </b>' . $row['last_name'] . ", ";
                echo '<b>Телефон : </b>' . $row['numberphone'] . ", ";
                echo '<b>E-mail : </b>' . $row['email'] . ", ";
                echo '<b>Дата : </b>' . $row['data'];
                echo "<br />";
                exit;
            }
        }
        else {
            header('Location: report.html'); // если id уже удалён ранее, то переадресация на Главную
        }
    }

}
