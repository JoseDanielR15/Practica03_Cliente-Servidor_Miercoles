<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/Practica03_Cliente-Servidor_Miercoles/Views/layout.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Practica03_Cliente-Servidor_Miercoles/Controllers/ProductosController.php";

$productos = ObtenerProductosHome();
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarHead(); ?>

<body>

    <?php MostrarNavbar(); ?>

    <!-- ================= SLIDER ================= -->
    <div class="container d-flex justify-content-center my-4">

        <div id="carouselExampleIndicators" class="carousel slide w-75" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            </div>

            <!-- Imágenes -->
			<div class="carousel-inner">
				<div class="carousel-item active" data-bs-interval="3000">
					<img src="../assets/images/Bannerspagina01.png" class="d-block w-100" alt="Banner Logitech">
				</div>
				<div class="carousel-item" data-bs-interval="3000">
					<img src="../assets/images/Bannerspagina02.png" class="d-block w-100" alt="Banner Sony">
				</div>
				<div class="carousel-item" data-bs-interval="3000">
					<img src="../assets/images/Bannerspagina03.png" class="d-block w-100" alt="Banner Nvidia">
				</div>
			</div>

        </div>
    </div>

    <!-- ================= PRODUCTOS ================= -->
    <div class="container mt-5">

        <h3 class="text-center mb-4">Productos Disponibles</h3>

        <div class="row">

            <?php while ($producto = mysqli_fetch_assoc($productos)) { ?>

                <div class="col-md-4 mb-4">
                    <div class="card shadow h-100">

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title"><?= $producto['Descripcion'] ?></h5>

                            <p class="text-muted">Precio: ₡<?= number_format($producto['Precio'], 2) ?></p>

                            <p class="text-muted">Saldo: ₡<?= number_format($producto['Saldo'], 2) ?></p>

                            <div class="mt-auto">
                                <?php if ($producto['Estado'] == "Pendiente") { ?>
                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                <?php } else { ?>
                                    <span class="badge bg-success">Cancelado</span>
                                <?php } ?>
                            </div>

                        </div>

                    </div>
                </div>

            <?php } ?>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>