<?php
  function check_input($task_name, $error) {
    $error = "";

    if (empty($task_name)){
      $error = "タスク名を入力してください";
      return false;
    }
    return true;
  }
?>