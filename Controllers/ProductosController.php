<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Practica03_Cliente-Servidor_Miercoles/Models/ProductosModel.php";

function MostrarProductos()
{
    return ObtenerProductos();
}

function ObtenerProductosHome()
{
    return ObtenerProductosInicio();
}
?>