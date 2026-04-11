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

function ObtenerComprasPendientes()
{
    $conexion = OpenDatabase();
    $resultado = mysqli_query($conexion, "CALL sp_ConsultarComprasPendientes()");
    $datos = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $datos[] = $fila;
    }
    CloseDatabase($conexion);
    return $datos;
}

function ObtenerSaldoCompra($idCompra)
{
    $conexion = OpenDatabase();
    $resultado = mysqli_query($conexion, "CALL sp_ConsultarSaldoCompra('$idCompra')");
    $datos = null;
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $datos = $fila;
    }
    CloseDatabase($conexion);
    return $datos;
}

function RegistrarAbono($idCompra, $monto)
{
    try {
        $conexion = OpenDatabase();
        $resultado = mysqli_query($conexion, "CALL sp_RegistrarAbono('$idCompra', '$monto')");
        CloseDatabase($conexion);
        return $resultado;
    } catch (Exception $e) {
        return false;
    }
}