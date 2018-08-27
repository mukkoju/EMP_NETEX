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
      
      case 'getallemp':
        
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