<?php

class Model{

  public function getDBConnection() {
      return new PDO('mysql:host=localhost;dbname=netex', 'root', 'dambo');
  }
}
