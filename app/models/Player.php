<?php

namespace Model;
use JsonSerializable;

class Player implements JsonSerializable {
 private $id;
 private $name;
//  private $surname;
 public function __construct($id, $name){
 $this->id = $id;
 $this->name = $name;
//  $this->surname = $surname;
 }
 public function jsonSerialize() {
 return get_object_vars($this);
 }
}