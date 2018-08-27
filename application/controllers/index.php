<?php

/**
 * @author Sathish Kumar Mukkoju <sm@kahaniya.com>
 */



class Index extends Controller {
  
  public function __construct() {
    parent::__construct();
  }
  
  public function index() {
    if(empty($_SESSION['id'])) {
      $this->view->render('index');
    } else {
      header("Location: /home");
    }
  }
  
  public function home() {
    if(!empty($_SESSION['id'])) {
      $this->view->render('home');
    } else {
      header("Location: /");
    }  
  }
  
  public function saveEmp($data) {
    if(!$this->hasSession())
      return '{"status": 0, "msg": "session required"}';
    
    if(empty($data['id']))
      return '{"status": 0, "msg": "Id cannot be empty"}';
    elseif(empty($data['name']))
      return '{"status": 0, "msg": "Name cannot be empty"}';
    elseif(empty($data['email']))
      return '{"status": 0, "msg": "email cannot be empty"}';
    elseif(empty($data['mobile']))
      return '{"status": 0, "msg": "mobile cannot be empty"}';
    elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
      return '{"status": 0, "msg": "Invalid Email"}';
    elseif(!preg_match('/^[0-9]{10}+$/', $data['mobile']))
      return '{"status": 0, "msg": "Invalid Mobile"}';
    
    require APP_PATH . '/models/employe.php';
    return (new EmployeeModel())->saveEmployee($data['id'], $data['name'], $data['email'], $data['mobile']);
    
  }
  
  
  public function getAllEmployees() {
    if(!$this->hasSession())
      return '{"status": 0, "msg": "session required"}';
    
    require APP_PATH . '/models/employe.php';
    return (new EmployeeModel())->getAllEmployes();
  }

  
  public function login($data) {
    require APP_PATH . '/models/employe.php';
    return (new EmployeeModel())->setsession($data['username'], $data['password']);
  }
  
  public function logout() {
    setcookie ('khIntr', '', 0);
    session_unset();
    session_destroy();
    header("Location: /");
    exit();
  }
  
  public function hasSession() {
    if(empty($_SESSION['id']))
      return false;
    else
      return true;
  }
}


