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
}


