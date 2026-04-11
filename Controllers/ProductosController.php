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

if (isset($_POST["btnAbonar"])) {
    $idCompra = $_POST["IdCompra"];
    $monto = $_POST["Abono"];

    $result = RegistrarAbono($idCompra, $monto);

    if ($result) {
        header("Location: ../vProductos/consulta.php");
        exit;
    } else {
        $_POST["Mensaje"] = "El abono no fue registrado correctamente";
    }
}

if (isset($_POST["btnObtenerSaldo"])) {
    $idCompra = $_POST["IdCompra"];
    $resultado = ObtenerSaldoCompra($idCompra);
    echo json_encode($resultado);
    exit;
}