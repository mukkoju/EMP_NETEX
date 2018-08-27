<?php

class EmployeeModel {

  public function saveEmployee($id, $name, $email, $mobile) {
    $db = $this->getdb();

    $tmp = $db->query("SELECT id from emp WHERE id = " . $db->quote($id));
    $res = $tmp->fetch(PDO::FETCH_ASSOC);
    if ($res) {
      if ($db->exec("UPDATE emp SET name = " . $db->quote($name) . ", email = " . $db->quote($email) . ", mobile = " . $db->quote($mobile) . " WHERE id = " . $db->quote($id) . "")) {
        return '{"status": 1, "msg": "Updated successfully!"}';
      } else {
        return '{"status": 0, "msg": "Something went wrong please try again"}';
      }
    } else {
      if ($db->exec("INSERT INTO emp VALUES(" . $db->quote($id) . ", " . $db->quote($name) . ", " . $db->quote($email) . ", " . $db->quote($mobile) . ")")) {
        return '{"status": 1, "msg": "User Created successfully!"}';
      } else {
        return '{"status": 0, "msg": "Something went wrong please try again"}';
      }
    }
  }
  
  public function getEmployee($empId) {
    $db = $this->getdb();
    $tmp = $db->query("SELECT * from emp WHERE id = " . $db->quote($id));
    $res = $tmp->fetch(PDO::FETCH_ASSOC);
    if($res) {
    return json_encode($res);
    } else {
      return '{"status": 0, "msg": "No Employess Found"}';
    }
  }
  
  
  public function getAllEmployes($empId) {
    $db = $this->getdb();
    $tmp = $db->query("SELECT * from emp WHERE LIMIT 0,100");
    $res = $tmp->fetch(PDO::FETCH_ASSOC);
    if($res) {
    return json_encode($res);
    } else {
      return '{"status": 0, "msg": "No Employess Found"}';
    }
  }

  private function getdb() {
    return new PDO('mysql:host=localhost;dbname=netex', 'root', 'dambo');
  }
}

?>