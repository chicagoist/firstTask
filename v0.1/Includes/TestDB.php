<?php

class TestDB extends mysqli {

    // один экземпляр разделен между всеми экземплярами класса
    private static $instance = null;
    // переменные для доступа к БД
    private $user = "user";
    private $pass = "pass";
    private $dbName = "DB";
    private $dbHost = "localhost";

// Этот метод должен быть static и должен возвращать экземпляр объекта, если объект
// еще не существует.
    public static function getInstance() {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
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

        //команда создания таблицы
        $create_table = "CREATE TABLE customers ( id INT(11) NOT NULL "
                . "AUTO_INCREMENT PRIMARY KEY, "
                . "first_name TINYTEXT, "
                . "last_name TINYTEXT, "
                . "numberphone VARCHAR(20), "
                . "email TINYTEXT,"
                . "data VARCHAR(20) )";


        //если в БД не существует данной таблицы, то создание её, если есть уже, то - игнорирование
        $this->query($create_table);
    }

    //для извлечения идентификатора пользователя на основе имени
    public function get_customer_id_by_first_name($arg) { 
        $name = $this->real_escape_string($arg);

        $customer = $this->query("SELECT id FROM customers WHERE first_name = '"
                . $name . "'");
        if ($customer->num_rows > 0) {
            $row = $customer->fetch_row();
            return $row[0];
        } else
            return null;
    }

    // для извлечения строки,
    //принадлежащей определенному пользователю с соответствующим идентификатором
    public function get_row_by_id($id_row) {  

        return $this->query("SELECT first_name, last_name, numberphone, email, data FROM customers WHERE id=" . $id_row);
    }

    //создание новой строки в таблице customers
    public function create_customer($first_name, $last_name, $numberphone, $email, $data) {
        $first_name = $this->real_escape_string($first_name);
        $last_name = $this->real_escape_string($last_name);
        $numberphone = $this->real_escape_string($numberphone);
        $email = $this->real_escape_string($email);
        $data = $this->real_escape_string($data);
        $this->query("INSERT INTO customers (first_name,last_name,numberphone,email,data) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $numberphone . "', '" . $email . "', '" . $data . "')");
    }

}
