<?php
function MostrarHead()
{
?>

    <head>
        <meta charset="UTF-8">
        <title>Sistema de Abonos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
<?php
}

function MostrarNavbar()
{
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand fw-bold" href="/Practica03_Cliente-Servidor_Miercoles/Views/vHome/inicio.php">
                Sistema de Abonos
            </a>

            <div class="ms-auto">
                <a class="btn btn-outline-light btn-sm me-2"
                    href="/Practica03_Cliente-Servidor_Miercoles/Views/vProductos/consulta.php">
                    Consulta
                </a>

                <a class="btn btn-outline-warning btn-sm"
                    href="/Practica03_Cliente-Servidor_Miercoles/Views/vProductos/registro.php">
                    Registro
                </a>
            </div>

        </div>
    </nav>
<?php
}
?>