<?php

use Airam\Store\Models\Evento;
use Airam\Store\Models\Mixto;
use Airam\Store\Models\Normal;
use Airam\Store\Models\Perecedero;
use Airam\Store\Models\Producto;
use Airam\Store\Models\Sesiones;
use Airam\Store\Controllers\Tienda;

$tiendaVirtual = new Tienda();
$hoy = new DateTime();
$eventoHoy = $hoy->format('Y-m-d');

//  2 productos no perecederos.
$tiendaVirtual->añadirElemento(new Producto("Sobre de Magic", 22.22, "HASBRO", 25, 50));
$tiendaVirtual->añadirElemento(new Producto("Nevera", 999.99, "LG", 57500, 70000));

// 1 producto perecedero que haya caducado.
$tiendaVirtual->añadirElemento(new Perecedero("Kitkat", 7.00, "Kitkat-company", 10, 20, "2020-01-16"));

// 1 producto perecedero que caduque en 2 días.
$proximaFecha = (clone $hoy)->modify('+2 days')->format('Y-m-d');
$tiendaVirtual->añadirElemento(new Perecedero("Pienso de Perros", 30, "Mercadona", 1000, 1000, $proximaFecha));

// 1 producto perecedero que caduque en 25 días.
$proximaFecha = (clone $hoy)->modify('+25 days')->format('Y-m-d');
$tiendaVirtual->añadirElemento(new Perecedero("Champu para calvos", 0.99, "CalvoCompany", 100, 100, $proximaFecha));

// 3 eventos: uno caducado, otro que caduque hoy y otro que caduque en unos meses.
$proximaFecha = (clone $hoy)->modify('+3 months')->format('Y-m-d');
$tiendaVirtual->añadirElemento(new Evento("Cathering de boda", 55000.00, "2015-07-015"));
$tiendaVirtual->añadirElemento(new Evento("Soborno para aprobar", 55550.00, $eventoHoy));
$tiendaVirtual->añadirElemento(new Evento("Terminar trabajo", 10000000.00, $proximaFecha));

// 2 servicios por sesiones: uno al que le quedan pocas sesiones y otro al que no le queda ninguna.
$tiendaVirtual->añadirElemento(new Sesiones("Clases de jazz", 500.00, 7));
$tiendaVirtual->añadirElemento(new Sesiones("Clases de guitarra", 80.00, 0));

// 2 servicios mixtos: uno caducado y otro no.
$tiendaVirtual->añadirElemento(new Mixto("Vivir", 10.00, "2022-04-03", 17));
$proximaFecha = (clone $hoy)->modify('+9 months')->format('Y-m-d');

$tiendaVirtual->añadirElemento(new Mixto("Graduado en DAW", 600.00, $proximaFecha, 70));

// 2 servicios normales.
$tiendaVirtual->añadirElemento(new Normal("Profesora particular", 20.00));
$tiendaVirtual->añadirElemento(new Normal("Chofer particular", 60.00));
