<?php
    class Connection
    {
        // Данные для подключения
        public $servername; // локалхост
        public $username; // имя пользователя
        private $password; // пароль если существует
        public $db; // База данных
        public $connection; // Соединение с БД

        function __construct($servername, $username, $password, $db)
        {
            $this->servername = $servername;
            $this->username = $username;
            $this->password = $password;
            $this->db = $db;
        }

        // Открыть подключение
        function openConnection()
        {
            $this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->db);
            // Проверка соединения
            if (!$this->connection) {
                die("Ошибка подключения: " . mysqli_connect_error());
            }
        }        

        // Закрыть подключение
        function closeConnection()
        {
            mysqli_close($this->connection);
        }
    }
