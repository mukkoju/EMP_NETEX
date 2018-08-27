<?php

class Bootstrap {
  public function __construct() {
    $rawUrl = strtolower(trim($_SERVER['REQUEST_URI'], '/'));
    $url = explode('/', $rawUrl);
    
    switch ($url[0]) {
      case '';
        require  APP_PATH . '/controllers/index.php';
        (new Index())->index();
        break;
      
      case 'home';
        require APP_PATH . '/controllers/index.php';
        (new Index())->home();
        break;
      
      case 'saveemp':
        require APP_PATH . '/controllers/index.php';
        echo (new Index())->saveEmp($_POST);
        break;
      
      case 'getallemp':
        require APP_PATH . '/controllers/index.php';
        echo (new Index())->getAllEmployees();
        break;
      
      case 'getemp':
        require APP_PATH . '/controllers/index.php';
        echo (new Index())->getEmployee();
        break;
      
      case "login":
        require APP_PATH . '/controllers/index.php';
        echo (new Index())->login($_POST);
        break;
      
      case "logout":
        require APP_PATH . '/controllers/index.php';
        echo (new Index())->logout();
        break;
      
      case 'getemp':
        
        break;
      
      case 'createemp':
        
        break;
      
      case 'updateemp':
        
        break;
      
      default :
        break;
    }
  }
}