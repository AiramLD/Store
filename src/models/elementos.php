<?php

namespace Airam\Store\Models;

use ReflectionClass;

abstract class Elemento {
    protected $nombre;
    protected $precioBase;
    protected $impuestos = 0.07;

    public function __construct($nombre, $precioBase)
    {
        $this->setNombre($nombre);
        $this->setPrecioBase($precioBase);
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getPrecioBase()
    {
        return $this->precioBase;
    }

    public function setPrecioBase($precioBase)
    {
        $this->precioBase = $precioBase;
    }

    public function getImpuestos()
    {
        return $this->impuestos;
    }

    public function setImpuestos($impuestos)
    {
        $this->impuestos = $impuestos;
    }

    public function getPrecio()
    {
        return $this->getPrecioBase() + ($this->getPrecioBase() * $this->getImpuestos());
    }

    public function __toString()
    {
        $type = new ReflectionClass($this);
        return $this->getNombre() . 
        ", tiene un precio de " . 
        round($this->getPrecio(), 2) . "€";
    }
}
