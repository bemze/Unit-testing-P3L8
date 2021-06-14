<?php

namespace Repository;
use Model\Player;
class PlayerRepository {
 private $server; private $username; private $password; private $database; private $conn;
 public function __construct(){
 $this->server = "localhost";
 $this->username = "root";
 $this->password = "";
 $this->database = "qa";
 $this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);
 }
 public function getAll() : array {
 $result = mysqli_query($this->conn, "SELECT id, name FROM Player");

 $players = array();
 if (mysqli_num_rows($result) > 0)
 while($row = mysqli_fetch_assoc($result)){
 array_push($players, new Player($row['id'], $row['name']));
 }
 mysqli_close($this->conn);
 return $players;
 }
 public function getById(){}
 public function save(Player $e){ }
}
