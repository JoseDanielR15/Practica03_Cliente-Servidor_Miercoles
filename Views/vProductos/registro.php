<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Practica03_Cliente-Servidor_Miercoles/Controllers/ProductosController.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Practica03_Cliente-Servidor_Miercoles/Views/layout.php";

$comprasPendientes = ObtenerComprasPendientes();

if (isset($_POST["Mensaje"])) {
    echo "<script>alert('" . $_POST["Mensaje"] . "')</script>";
}
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body>

    <?php MostrarNavbar(); ?>

    <div class="container mt-5">
        <div class="card p-4 shadow" style="max-width: 600px; margin: auto;">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Registrar Abono</h3>
                <a href="/Practica03_Cliente-Servidor_Miercoles/Views/vProductos/consulta.php"
                    class="btn btn-outline-primary">
                    ⬅ Volver
                </a>
            </div>

            <form method="POST" action="" id="formAbono">

                <!-- Compra -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Compra</label>
                    <select name="IdCompra" id="IdCompra" class="form-select" required>
                        <option value="">-- Seleccione una compra --</option>
                        <?php foreach ($comprasPendientes as $compra) { ?>
                            <option value="<?= $compra['Id_Compra'] ?>">
                                <?= $compra['Descripcion'] ?> — Saldo: ₡<?= number_format($compra['Saldo'], 2) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Saldo Anterior -->
                <div class="mb-3">
                    <label class="form-label fw-bold text-muted">Saldo Anterior</label>
                    <input type="text" id="SaldoAnterior" class="form-control bg-light rounded-0" readonly
                        placeholder="Se carga al seleccionar una compra">
                </div>

                <!-- Abono -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Abono</label>
                    <input type="number" name="Abono" id="Abono" class="form-control"
                        placeholder="Ingrese el monto a abonar" step="0.01" min="0.01" required>
                    <div id="mensajeError" class="text-danger mt-1" style="display:none;">
                        El abono no puede ser mayor al saldo anterior.
                    </div>
                </div>

                <button type="submit" name="btnAbonar" class="btn btn-success w-100">Abonar</button>

            </form>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let saldoActual = 0;

        // Ajax: carga el saldo al seleccionar una compra
        $("#IdCompra").change(function() {
            let idCompra = $(this).val();

            if (idCompra === "") {
                $("#SaldoAnterior").val("");
                saldoActual = 0;
                return;
            }

            $.ajax({
                url: "/Practica03_Cliente-Servidor_Miercoles/Controllers/ProductosController.php",
                type: "POST",
                data: {
                    IdCompra: idCompra,
                    btnObtenerSaldo: true
                },
                success: function(response) {
                    let data = JSON.parse(response);
                    saldoActual = parseFloat(data.Saldo);
                    $("#SaldoAnterior").val("₡" + parseFloat(data.Saldo).toLocaleString("es-CR", {
                        minimumFractionDigits: 2
                    }));
                }
            });
        });

        // Validación: abono no puede ser mayor al saldo
        $("#formAbono").submit(function(e) {
            let abono = parseFloat($("#Abono").val());

            if (abono > saldoActual) {
                e.preventDefault();
                $("#mensajeError").show();
            } else {
                $("#mensajeError").hide();
            }
        });
    </script>

</body>

</html>