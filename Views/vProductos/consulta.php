<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Practica03_Cliente-Servidor_Miercoles/Controllers/ProductosController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Practica03_Cliente-Servidor_Miercoles/Views/layout.php";

$resultado = MostrarProductos();
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body>

    <?php MostrarNavbar(); ?>

    <div class="container mt-5">

        <div class="card p-4 shadow">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Lista de Productos</h3>

                <a href="/Practica03_Cliente-Servidor_Miercoles/Views/vHome/inicio.php"
                    class="btn btn-outline-primary">
                    ⬅ Volver al Inicio
                </a>
            </div>

            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Saldo</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                            <td><?= $fila['Id_Compra'] ?></td>
                            <td><?= $fila['Descripcion'] ?></td>
                            <td>₡<?= number_format($fila['Precio'], 2) ?></td>
                            <td>₡<?= number_format($fila['Saldo'], 2) ?></td>

                            <td>
                                <?php if ($fila['Estado'] == "Pendiente") { ?>
                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                <?php } else { ?>
                                    <span class="badge bg-success">Cancelado</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>

    </div>

</body>

</html>