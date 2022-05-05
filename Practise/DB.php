<?php
    class DB {
         
        private $con;

        function connect() {
            if(!$this->con) {
                $this->con =  mysqli_connect('localhost:3306', 'root', '', 'infor') or die('Connect Error');

                mysqli_query($this->con, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
                mysqli_set_charset($this->con, 'UTF8');
            }
        }
        
        function disconnect() {
            if($this->con) {
                mysqli_close($this->con);
            }
        }

        function insert($sql) {
            $this->connect();                        
            if(mysqli_query($this->con, $sql)) {
                return 1;
            }
            return 0;
        }
    }
?>