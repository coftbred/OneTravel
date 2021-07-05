<?php 

    class Destination {
        public $id;
        public $name;
        public $img;
        public $destination = [];
        public $conn;

        public function __construct($conn) {
            $this->conn = $conn;
        }

        public function getID($name) {
            $sql = "SELECT * FROM destination WHERE name = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $name);
            $stmt->execute();
            $result = $stmt->get_result();
            $this->destination =  $result->fetch_assoc();
        }

    }

?>