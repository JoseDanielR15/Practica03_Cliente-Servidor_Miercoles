<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Practica03_Cliente-Servidor_Miercoles/Models/UtilitarioModel.php";

function ObtenerProductos()
{
    $conexion = OpenDatabase();

    $query = "SELECT * FROM principal 
              ORDER BY 
              CASE 
                WHEN Estado = 'Pendiente' THEN 1
                ELSE 2
              END";

    $resultado = mysqli_query($conexion, $query);

    CloseDatabase($conexion);

    return $resultado;
}

function ObtenerProductosInicio()
{
    $conexion = OpenDatabase();

    $query = "SELECT * FROM principal";

    $resultado = mysqli_query($conexion, $query);

    CloseDatabase($conexion);

    return $resultado;
}
?>