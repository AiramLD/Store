<?php

namespace Airam\Store\Models;

class Perecedero extends Producto implements Tiempo{
  private $fecha_limite;

  public function __construct($nombre, $precioBase, $marca, $peso, $cantidad, $fecha_limite)
  {
    parent::__construct($nombre, $precioBase, $marca, $peso, $cantidad);
    $this->setFechaLimite($fecha_limite);
  }

  public function getFechaLimite()
  {
    return $this->fecha_limite;
  }

  public function setFechaLimite($fecha_limite)
  {
    $this->fecha_limite = $fecha_limite;
  }

  public function aExpirado()
  {
    $hoy = new \DateTime();
    $fecha_limite = new \DateTime($this->getFechaLimite());
    return $hoy > $fecha_limite;
  }

  public function cuantosDiasQuedan()
  {
    $hoy = new \DateTime();
    $fecha_limite = new \DateTime($this->getFechaLimite());
    return $hoy->diff($fecha_limite)->format('%a');
  }

  public function getPrecio()
  {
    if ($this->cuantosDiasQuedan() <= 30 && $this->cuantosDiasQuedan() != 0) return (parent::getPrecio() - ($this->getPrecioBase() * 0.10));
    if ($this->cuantosDiasQuedan() <= 10 && $this->cuantosDiasQuedan() != 0) return (parent::getPrecio() - ($this->getPrecioBase() * 0.25));
    return parent::getPrecio();
  }
  public function __toString(){
    if($this->aExpirado()) return "El producto ". $this->getName() . " caduco el dia " . $this->getFechaLimite();
    return parent::__toString() . ". El producto caducara el dia " . $this->getFechaLimite(); 
  }
}
