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
$tiendaVirtual->añadirElemento(new Evento("Efectos especiales - Festival", 2500.00, "2023-11-05"));
$tiendaVirtual->añadirElemento(new Evento("Mantenimiento de servidores", 350.00, $eventoHoy));
$tiendaVirtual->añadirElemento(new Evento("Instalación y configuración web", 1250.00, $proximaFecha));

// 2 servicios por sesiones: uno al que le quedan pocas sesiones y otro al que no le queda ninguna.

$tiendaVirtual->añadirElemento(new Sesiones("Clases Muay Thai", 45.00, 25));
$tiendaVirtual->añadirElemento(new Sesiones("Programación BackEnd FreeLancer", 1500.00, 40));

// 2 servicios mixtos: uno caducado y otro no.

$tiendaVirtual->añadirElemento(new Mixto("Desarrollo Web", 1880.00, "2023-11-08", 35));

$proximaFecha = (clone $hoy)->modify('+5 months')->format('Y-m-d');

$tiendaVirtual->añadirElemento(new Mixto("Academia Certificado Inglés C1", 600.00, $proximaFecha, 50));

// 2 servicios normales.

$tiendaVirtual->añadirElemento(new Normal("Servicio de limpieza", 200.00));
$tiendaVirtual->añadirElemento(new Normal("Servicio de gestión", 650.00));
