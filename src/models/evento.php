<?php


namespace Airam\Store\Models;

class Evento extends Servicio implements Tiempo{
  protected $diaFinal;

  public function __construct($nombre, $precioBase, $diaFinal)
  {
    parent::__construct($nombre, $precioBase);
    $this->setDiaFinal($diaFinal);
  }

  public function getDiaFinal()
  {
    return $this->diaFinal;
  }

  public function setDiaFinal($diaFinal)
  {
    $this->diaFinal = $diaFinal;
  }

  public function aExpirado()
{
  $hoy = new \DateTime();
  $diaFinal = \DateTime::createFromFormat('Y-m-d', $this->getDiaFinal());
  $hoy->setTime(0, 0, 0); 
  $diaFinal->setTime(0, 0, 0); 
  return $hoy > $diaFinal;
}

  public function cuantosDiasQuedan()
  {
    $hoy = new \DateTime();
    $diaFinal = new \DateTime($this->getDiaFinal());
    return $hoy->diff($diaFinal)->format('%a');
  }

  public function getPrecio()
  {
    if ($this->cuantosDiasQuedan() <= 7 && $this->cuantosDiasQuedan() != 0) return (parent::getPrecio() + ($this->getPrecioBase() * 0.20));
    if ($this->cuantosDiasQuedan() == 0) return (parent::getPrecio() + ($this->getPrecioBase() * 0.50));
    return parent::getPrecio();
  }

  public function __toString()
  {
    if ($this->aExpirado()) return "El evento " . $this->getName() . " ya a expiro el " . $this->getDiaFinal();
    return "El evento " . parent::__toString() . " es el dia " . $this->getDiaFinal();
  }
}
