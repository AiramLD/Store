<?php

namespace Airam\Store\Models;

class Normal extends Servicio {
  public function __construct($nombre, $precioBase) {
    parent::__construct($nombre, $precioBase);
  }

  public function __toString(){
    return "El servicio normal  es " . parent::__toString();
  }
}