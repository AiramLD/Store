<?php 


namespace Airam\Store\Models;

class Producto extends Elemento {
  protected $marca;
  protected $peso;
  protected $cantidad;

  public function __construct($nombre, $precioBase, $marca, $peso, $cantidad) {
    parent::__construct($nombre, $precioBase);
    $this->setMarca($marca);
    $this->setPeso($peso);
    $this->setCantidad($cantidad);
  }

  public function getMarca() {
    return $this->marca;
  }

  public function setMarca($marca) {
    $this->marca = $marca;
  }

  public function getPeso() {
    return $this->peso;
  }

  public function setPeso($peso) {
    $this->peso = $peso;
  }

  public function getCantidad() {
    return $this->cantidad;
  }

  public function setCantidad($cantidad) {
    $this->cantidad = $cantidad;
  }

  public function getCosteEnvio() {
    $precioCantidad = 0;
      for ($i=0; $i <= $this->getCantidad(); $i+= 1000) { 
          $precioCantidad++;
      }
    return (2 + ($this->getPeso() * 0.0002) + $precioCantidad);
  }

  public function getPrecio() {
    return parent::getPrecio() + $this->getCosteEnvio();
  }

  public function __toString(){
    return "El producto " . parent::__toString() . ", pesa un total de" . $this->getPeso(). " gramos " . " y tiene un volumen de " . $this->getCantidad() . " cm3";
  }
}