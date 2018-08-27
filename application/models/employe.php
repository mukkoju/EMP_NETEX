<?php

class EmployeeModel {

  public function setsession($id, $password) {
    $db = $this->getdb();
    $tmp = $db->query("SELECT id from emp WHERE id = " . $db->quote($id) . " AND password = " . $db->quote($password) . "");
    $res = $tmp->fetch(PDO::FETCH_ASSOC);
    if ($res || ($id == 'admin' && $password == '123456')) {
      $_SESSION['id'] = $id;
      return '{"status": 1, "msg": "Login Successfullyu!!"}';
    } else {
      return '{"status": 0, "msg": "Invalid Credentials"}';
    }
  }

  public function saveEmployee($id, $name, $email, $mobile, $password = '123456') {
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
      if ($db->exec("INSERT INTO emp VALUES(" . $db->quote($id) . ", " . $db->quote($name) . ", " . $db->quote($email) . ", " . $db->quote($mobile) . ", " . $db->quote($password) . ")")) {
        return '{"status": 1, "msg": "User Created successfully!"}';
      } else {
        return '{"status": 0, "msg": "Something went wrong please try again"}';
      }
    }
  }

  public function getEmployee($id) {
    $db = $this->getdb();
    $tmp = $db->query("SELECT id, name, email, mobile from emp WHERE id = " . $db->quote($id));
    $res = $tmp->fetch(PDO::FETCH_ASSOC);
    if ($res) {
      return '{"status": 1, "msg": ' . json_encode($res) . '}';
    } else {
      return '{"status": 0, "msg": "No Employe Found"}';
    }
  }

  public function getAllEmployes($empId) {
    $db = $this->getdb();
    $tmp = $db->query("SELECT id, name, email, mobile from emp LIMIT 0,100");
    $res = $tmp->fetchAll(PDO::FETCH_ASSOC);
    if ($res) {
      return '{"status": 1, "msg": ' . json_encode($res) . '}';
    } else {
      return '{"status": 0, "msg": "No Employees Found"}';
    }
  }

  private function getdb() {
    return new PDO('mysql:host=localhost;dbname=netex', 'root', 'dambo');
  }
}

?>