<?php
  class DBManager {
    private $access_info;
    private $user;
    private $password;
    private $db = null;

    function __construct() {
      $this->access_info = "mysql:host=localhost;dbname=todos";
      $this->user = "root";
      $this->password = "root";
    }

    private function connect() {
      $this->db = new PDO($this->access_info, $this->user, $this->password);
    }
    
    private function disconnect() {
      $this->db = null;
    }
    //全てのタスクを取得
    function get_alltasks(){
      try {
        $this->connect();
        $stmt = $this->db->prepare("SELECT * FROM ORDER BY id;");
        $res = $stmt->execute();
        if($res) {
          $task = $stmt->fetchAll();
          $this->disconnect();
          return $task;
        }
      } catch(PDOException $e) {
        $this->disconnect();
        return null;
      }
      $this->disconnect();
      return null;
    }
    //特定のタスクを取得
    function get_task($id){
      try {
        $this->connect();
        $stmt->db->prepare("SELECT * FROM todo-table WHERE id = ? ;");
        $stmt->bindparam(1, $id, PDO::PARAM_INT);
        $res = $stmt->execute();
        if($res) {
          $task = $stmt->fetchAll();
          $this->disconnect();
          return $task;
        }
      } catch(PDOException $e) {
        $this->disconnect();
        return null;
      }
      $this->disconnect();
      return null; 
    }

    //タスクの削除
    function delete_task($id) {
      try {
        $this->connect();
        $stmt->db->prepare("DELETE FROM todo-table WHERE id = ?;");
        $stmt->bindparam(1, $id, PDO::PARAM_INT);
        $res = $stmt->execute();
        return true;
      } catch(PDOException $e) {
        $this->disconnect();
        return null;
      }
      $this->disconnect();
      return null;
    }

    //タスクの更新
    function update_task($id, $todo_name, $todo_status) {
      try {
        $this->connect();
        $stmt->db->prepare("UPDATE todo-table SET id = ?, todo_name = ?, todo_status = ? WHERE id = ?;");
        $stmt->bindparam(1, $id, PDO::PARAM_INT);
        $stmt->bindparam(2, $todo_name, PDO::PARAM_STR);
        $stmt->bindparam(3, $todo_status, PDO::PARAM_BOOL);
        $res = $stmt->execute();
        $this->disconnect();
        return true;
      } catch(PDOException $e){
        $this->disconnect();
        return false;        
      }
      $this->disconnect();
      return false;
    } 
  }