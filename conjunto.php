<?php 

    $nome1 = $_POST['nome1'];
    $nome2 = $_POST['nome2'];

    $set1 = $_POST['conjunto1'];
    $set2 = $_POST['conjunto2'];
    
    $set1 = explode(",", $set1);
    $set2 = explode(",", $set2);

    $set1 = array_unique($set1);
    $set2 = array_unique($set2);


    $set1 = array_map('trim', $set1);
    $set2 = array_map('trim', $set2);

    $card1 = count($set1);
    $card2 = count($set2);

    $set1 = array_map('strtoupper', $set1);
    $set2 = array_map('strtoupper', $set2);


    $setUni = array_merge($set1, $set2);
    $setUni = array_unique($setUni);
    $cardUni = count($setUni);
    sort($setUni);

    $setInter = array_intersect($set1, $set2);
    $cardInter = count($setInter);
    sort($setInter);

    $indiceJacc = $cardInter / $cardUni;

    $setDifAB = array_diff($set1, $set2);

    $setDifBA = array_diff($set2, $set1);

    $setDifSim = array_merge($setDifAB, $setDifBA);
    sort($setDifSim);

    $set1 = implode(', ', $set1);
    $set2 = implode(', ', $set2);
    $setUni = implode(', ', $setUni);
    $setInter = implode(', ', $setInter);
    $setDifAB = implode(', ', $setDifAB);
    $setDifBA = implode(', ', $setDifBA);
    $setDifSim = implode(', ', $setDifSim);
    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Set</title>
    <style>
    body { font-family: sans-serif; background: #f4f4f9; padding: 20px; }
    .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
    h3 { color: #333; border-bottom: 2px solid #ddd; padding-bottom: 10px; }
    .res { font-weight: bold; color: #2c3e50; font-family: monospace; font-size: 1.2em; }
    .label { color: #7f8c8d; font-size: 0.9em; }
    .operacao { margin-bottom: 15px; padding: 10px; border-left: 5px solid #3498db; background: #eaf2f8; }
    .interseccao { border-left-color: #27ae60; background: #eafaf1; }
    .diferenca { border-left-color: #e67e22; background: #fef5e7; }
    </style>
</head>
<body>
    <h3>Conjunto <?php echo $nome1?> = {<?php echo $set1?>} e #<?php echo $nome1?> = <?php echo $card1?></h3>
    <h3>Conjunto <?php echo $nome2?> = {<?php echo $set2?>} e #<?php echo $nome2?> = <?php echo $card2?></h3>
    <h3><?php echo $nome1?> ∩ <?php echo $nome2?> = {<?php echo $setInter?>} </h3>
    <h3><?php echo $nome1?> ∪ <?php echo $nome2?> = {<?php echo $setUni?>}</h3>
    <h3>#(<?php echo $nome1?> ∩ <?php echo $nome2?>) = <?php echo $cardInter?></h3>
    <h3>#(<?php echo $nome1?> ∪ <?php echo $nome2?>) = <?php echo $cardUni?></h3>
    <h3>A Diferença do conjunto <?php echo $nome1?> e <?php echo $nome2?> = {<?php echo $setDifAB?>}</h3>
    <h3>A Diferença do conjunto <?php echo $nome2?> e <?php echo $nome1?> = {<?php echo $setDifBA?>}</h3>
    <h3>A Diferença Simetrica do conjunto <?php echo $nome1?> e <?php echo $nome2?> = {<?php echo $setDifSim?>}</h3>
    <h3>O indice Jaccard: <?php echo "$cardInter / $cardUni = $indiceJacc ou similaridade de " . $indiceJacc * 100 . "%"?></h3>
    <a href="index.html">Testar Novamente</a>
</body>
</html>
