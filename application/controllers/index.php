<?php

/**
 * @author Sathish Kumar Mukkoju <sm@kahaniya.com>
 */



class Index extends Controller {
  
  public function __construct() {
    parent::__construct();
  }
  
  public function index() {
    $this->view->render('index');
  }
  
  public function home() {
    $this->view->render('home');
  }
  
  public function saveEmp($data) {
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
  
}


