<?php

class DeleteID extends mysqli {

    // один экземпляр разделен между всеми экземплярами класса
    private static $object = null;
    // переменные для доступа к БД
    private $user = "user";
    private $pass = "pass";
    private $dbName = "DB";
    private $dbHost = "localhost";

    // Этот метод должен быть static и должен возвращать экземпляр объекта, если объект
// еще не существует.
    public static function getObject() {
        if (!self::$object instanceof self) {
            self::$object = new self;
        }
        return self::$object;
    }

    // Методы clone и wakeup предотвращают внешнее создание копий класса Singleton,
    // таким образом исключая возможность дублирования объектов.
    public function __clone() {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup() {
        trigger_error('Deserializing is not allowed.', E_USER_ERROR);
    }

    // private constructor
    private function __construct() {
        parent::__construct($this->dbHost, $this->user, $this->pass, $this->dbName);
        if (mysqli_connect_error()) {
            exit('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
        parent::set_charset('utf-8');
    }

    // удаление строки по id
    public function delete_row_by_id($delete_id) {

        $this->query("DELETE FROM customers WHERE id=" . $delete_id);

        // проверка удаления строки по id
        EditRow::getObject()->print_row($delete_id);

        $check_id = $this->query("SELECT id FROM customers WHERE id=" . $delete_id);


        if ($check_id) {
            echo "Check TABLE in DB by this id:" . $delete_id . "<br />";
            echo "SUCSSES ! NO MORE IN DATABASE id: " . $delete_id . "<br />";
            echo "<pre>";
            print_r($check_id);
            echo "</pre>";
        }
    }

}
