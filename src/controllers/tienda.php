<?php

namespace Airam\Store\Controllers;

use Airam\Store\Models\Producto;
use Airam\Store\Models\Servicio;
use Airam\Store\Models\Tiempo;

class Tienda {

  private $elementos = [];

  public function añadirElemento($Elemento) {
    $this->elementos[] = $Elemento;
  }

  public function getElementos() {
    return $this->elementos;
  }

  public function mostrarElementos() {
    $arrayElementos = [];
    foreach ($this->getElementos() as $Elemento) {
      $arrayElementos[] = $Elemento;
    }
    return $arrayElementos;
  }

  public function mostrarProductos() {
    $arrayProductos = [];
    foreach ($this->getElementos() as $Elemento) {
      if ($Elemento instanceof Producto) {
        $arrayProductos[] = $Elemento;
      }
    }
    return $arrayProductos;
  }
  public function mostrarServicios() {
    $arrayServicios = [];
    foreach ($this->getElementos() as $Elemento) {
      if ($Elemento instanceof Servicio) {
        $arrayServicios[] = $Elemento;
      }
    }
    return $arrayServicios;
  }

  public function mostrarElementosConFecha() {
    $arrayEventos = [];
    foreach ($this->getElementos() as $Elemento) {
      if ($Elemento instanceof Tiempo) {
        $arrayEventos[] = $Elemento;
      }
    }
    return $arrayEventos;
  }

  public function mostrarElementosNoCaducos() {
    $arrayCaducado = [];
    foreach ($this->mostrarElementosConFecha() as $Elemento) {
      if ($Elemento->aExpirado() == false) {
        $arrayCaducado[] = $Elemento;
      }
    }
    return $arrayCaducado;
  }
}
