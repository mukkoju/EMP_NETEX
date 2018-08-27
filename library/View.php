<?php

class View {
  public function render($file) {
    require APP_PATH . '/views/layout/header.php';
    require APP_PATH . '/views/' . $file . '.php';
    require APP_PATH . '/views/layout/footer.php';
  }
}    