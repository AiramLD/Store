<?php

namespace Airam\Store\Models;


class Mixto extends Servicio implements Tiempo, Gastado
{

  private $diaFinal;
  private $sesiones;

  public function __construct($nombre, $precioBase, $diaFinal, $sesiones)
  {
    parent::__construct($nombre, $precioBase);
    $this->setDiaFinal($diaFinal);
    $this->setSesiones($sesiones);
  }

  public function getDiaFinal()
  {
    return $this->diaFinal;
  }

  public function setDiaFinal($diaFinal)
  {
    $this->diaFinal = $diaFinal;
  }

  public function getSesiones()
  {
    return $this->sesiones;
  }

  public function setSesiones($sesiones)
  {
    $this->sesiones = $sesiones;
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
    if ($this->aExpirado() == false) return 0;
    $hoy = new \DateTime();
    $diaFinal = new \DateTime($this->getDiaFinal());
    return $hoy->diff($diaFinal)->format('%a');
  }

  public function getPrecio()
  {
    if ($this->cuantosDiasQuedan() <= 7 && $this->cuantosDiasQuedan() != 0) return (parent::getPrecio() + ($this->getPrecioBase() * 0.20));
    if ($this->cuantosDiasQuedan() == 1 && $this->cuantosDiasQuedan() != 0) return (parent::getPrecio() + ($this->getPrecioBase() * 0.50));
    return parent::getPrecio();
  }

  public function gastar()
  {
    $this->setSesiones($this->getSesiones() - 1);
  }

  public function comprobar()
  {
    if ($this->getSesiones() == 0) return true;
  }

  public function __toString()
  {
    if ($this->comprobar() || $this->aExpirado()) return "El servicio mixto " . $this->getName() . " ya no tiene sesiones o ya ha caducado.";
    return "El servicio mixto " . parent::__toString() . " se usa el " . $this->getDiaFinal() . " y le quedan un total de " . $this->getSesiones() . " sesiones.";
  }
}
