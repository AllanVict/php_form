<?php include('layouts/header.php'); ?>

<?php
function dataParaNumero($data) {
    list($dia, $mes) = explode('/', $data);
    return intval($mes . str_pad($dia, 2, '0', STR_PAD_LEFT));
}

function estaNoPeriodo($nascimento, $inicio, $fim) {
    $diaMes = date('d/m', strtotime($nascimento));
    
    $nascNum = dataParaNumero($diaMes);
    $inicioNum = dataParaNumero($inicio);
    $fimNum = dataParaNumero($fim);
    
    if ($inicioNum > $fimNum) {
        return $nascNum >= $inicioNum || $nascNum <= $fimNum;
    } else {
        return $nascNum >= $inicioNum && $nascNum <= $fimNum;
    }
}

$nascimento = $_POST['data_nascimento'];
$signos = simplexml_load_file("signos.xml");
$signo = null;

foreach ($signos->signo as $s) {
    if (estaNoPeriodo($nascimento, (string)$s->dataInicio, (string)$s->dataFim)) {
        $signo = $s;
        break;
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if ($signo): ?>
                <div class="card shadow">
                    <div class="card-header bg-info text-white text-center py-3">
                        <h2 class="mb-0"><?php echo htmlspecialchars($signo->signoNome); ?></h2>
                    </div>
                    <div class="card-body">
                        <p class="text-center mb-4">
                            <strong>Período:</strong> 
                            <?php echo htmlspecialchars($signo->dataInicio); ?> - <?php echo htmlspecialchars($signo->dataFim); ?>
                        </p>
                        <p class="mb-4"><?php echo htmlspecialchars($signo->descricao); ?></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="index.php" class="btn btn-outline-info">Fazer nova consulta</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger text-center">
                    <strong>Signo não encontrado.</strong> Por favor, tente novamente.
                </div>
                <div class="text-center mt-3">
                    <a href="index.php" class="btn btn-outline-danger">Voltar</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>
