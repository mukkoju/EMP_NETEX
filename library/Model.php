<?php

class Model{

  public function getDBConnection($type, $db) {
      return new PDO('mysql:host=localhost;dbname='.$db, 'root', 'dambo');
  }
}
