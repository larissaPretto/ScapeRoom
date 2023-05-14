<?php
$slide = $_GET['slide'];

require_once "../model/pegarIdUsuario.php";

$query = "SELECT * FROM partida WHERE idUsuario = $idUsuario ORDER BY idPartida DESC LIMIT 1";
$stmt = mysqli_prepare($conectado, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$tempo = $row["tempo"];
$totalSegundos = array_reduce(explode(':', $tempo), function ($total, $tempo) {
    return $total * 60 + $tempo;
}, 0);
mysqli_close($conectado);
?>

<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vTETBQ80UEiEwQBofbB8Ue0OdJmr8Wvdj4Fu8R8BNs3h02Yn6vCZiY0bXHOlcYMy7QamO7V1Gq2qeh8/embed?start=false&loop=false&delayms=3000&&rm=minimal&slide=<?php echo $slide; ?>" frameborder="0" width="960" height="540" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>

<?php
if ($slide != 1)
    echo '<p id="cronometro"></p>';
?>
<script>
    var tempoRestante = <?php echo $totalSegundos; ?>;
</script>
<script src="../js/cronometro.js"></script>