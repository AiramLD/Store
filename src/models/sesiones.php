<?php 

namespace Airam\Store\Models;

class Sesiones extends Servicio implements Gastado{
  private $sesiones;

  public function __construct($nombre, $precioBase, $sesiones) {
    parent::__construct($nombre, $precioBase);
    $this->setSesiones($sesiones);
  }

  public function getSesiones() {
    return $this->sesiones;
  }

  public function setSesiones($sesiones) {
    $this->sesiones = $sesiones;
  }

  public function gastar() {
    $this->setSesiones($this->getSesiones() - 1);
  }

  public function comprobar() {
    if ($this->getSesiones() == 0) return true;
  }

  public function __toString()
  {
    if($this->comprobar() == true) return "Las sesiones con nombre " . parent::__toString() . " estan terminadas.";
    return "Las sesiones con nombre " . parent::__toString() . " le quedan un total de" . $this->getSesiones() . " sesiones.";
  }
}