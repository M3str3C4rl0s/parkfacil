<?php
$horas   = (int) $_POST['horas'];
$veiculo = (int) $_POST['veiculo'];   // 0 = carro | 1 = moto

if (isset($_POST['lavagem'])) {
    $lavagem = "sim";
} else {
    $lavagem = "nao";
}

if ($veiculo == 0) {
    $tipo      = "Carro";
    $primeira  = 10;
    $adicional = 6;
} else {
    $tipo      = "Moto";
    $primeira  = 6;
    $adicional = 3;
}

$total = $primeira;
for ($h = 2; $h <= $horas; $h++) {
    $total = $total + $adicional;
}

// limite do estacionamento (vale só para as horas)
$limiteAplicado = false;
if ($total > 50) {
    $total = 50;
    $limiteAplicado = true;
}

$valorHoras = $total;

if ($lavagem == "sim") {
    $total = $total + 20;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Park Fácil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5" style="max-width: 480px;">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
                <h1 class="h4 mb-0">ESTACIONAMENTO PARK FÁCIL</h1>
            </div>
            <div class="card-body">
                <h2 class="h5 mb-3">Resumo</h2>
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Veículo</span><span><?php echo $tipo; ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Horas</span><span><?php echo $horas; ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Valor das horas<?php if ($limiteAplicado) { echo " (limite aplicado)"; } ?></span>
                        <span>R$ <?php echo number_format($valorHoras, 2, ',', '.'); ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Lavagem</span>
                        <span><?php echo ($lavagem == "sim") ? "R$ 20,00" : "não"; ?></span>
                    </li>
                </ul>

                <div class="alert alert-success d-flex justify-content-between mb-4">
                    <strong>Total a pagar</strong>
                    <strong>R$ <?php echo number_format($total, 2, ',', '.'); ?></strong>
                </div>

                <a href="index.html" class="btn btn-outline-primary">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>