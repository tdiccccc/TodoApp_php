<?php
  class DBManager {
    private $access_info;
    private $user;
    private $password;
    private $db = null;

    function __construct() {
      $this->access_info = "mysql:host=localhost;dbname=";
      $this->user = "root";
      $this->password = "root";
    }

    private function connect() {
      $this->db = new PDO($this->access_info, $this->user, $this->password);
    }
    
    private function disconnect() {
      $this->db = null;
    }

    function get_alltasks(){
      try {
        $this->connect();
        $stmt = $this->db->prepare("SELECT * FROM ORDER BY id;");
        $res = $stmt->execute();
        if($res) {
          $member = $stmt->fetchAll();
          $this->disconnect();
          return $member;
        }
      } catch(PDOException $e) {
        $this->disconnect();
        return null;
      }
      $this->disconnect();
      return null;
    }
  }