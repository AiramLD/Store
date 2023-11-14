<?php

require '../../vendor/autoload.php';

require '../controllers/base-Tienda.php';

if (isset($_GET['filtro'])) {
    $filtro = $_GET['filtro'];

    switch ($filtro) {
        case 'todos':
            echo "<h1>Filtrar Elemento</h1>";
            echo "<ul>";
            foreach ($tiendaVirtual->mostrarElementos() as $Elemento) {
                echo "<br><li>{$Elemento}</li><br>";
            }
            echo "</ul>";
            break;

        case 'productos':
            echo "<h1>Filtrar productos</h1>";
            echo "<ul>";
            foreach ($tiendaVirtual->mostrarProductos() as $Elemento) {
                echo "<br><li>{$Elemento}</li><br>";
            }
            echo "</ul>";
            break;

        case 'servicios':
            echo "<h1>Filtrar servicios</h1>";
            echo "<ul>";
            foreach ($tiendaVirtual->mostrarServicios() as $Elemento) {
                echo "<br><li>{$Elemento}</li><br>";
            }
            echo "</ul>";
            break;

        case 'caducado':
            echo "<h1>Filtrar por fecha</h1>";
            echo "<ul>";
            foreach ($tiendaVirtual->mostrarElementosConFecha() as $Elemento) {
                echo "<br><li>{$Elemento}</li><br>";
            }
            echo "</ul>";
            break;

        case 'noCaducos':
            echo "<h1>Filtrar por vendibles</h1>";
            echo "<ul>";
            foreach ($tiendaVirtual->mostrarElementosNoCaducos() as $Elemento) {
                echo "<br><li>{$Elemento}</li><br>";
            }
            echo "</ul>";
            break;
        default:
            break;
    }
}
