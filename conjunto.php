<?php 

    $nome1 = $_POST['nome1']; # Aqui o $_POST captura o valor enviado pelo campo com o nome 'nome1', sendo o 'nome1' o nome do primeiro conjunto
    $nome2 = $_POST['nome2']; # Aqui o $_POST captura o valor enviado pelo campo com o nome 'nome2', sendo o 'nome2' o nome do primeiro conjunto

    $set1 = $_POST['conjunto1']; # Aqui o $_POST captura o valor enviado pelo campo com o nome 'conjunto1', sendo o 'conjunto1' os elementos do primeiro conjunto
    $set2 = $_POST['conjunto2']; # Aqui o $_POST captura o valor enviado pelo campo com o nome 'conjunto2', sendo o 'conjunto2' os elementos do segundo conjunto
    
    $set1 = explode(",", $set1); # Aqui a função explode() pega a variavel $set1 que foi recebida em string e divide ela em varias partes, se transformando em um array
    $set2 = explode(",", $set2); # Aqui a função explode() pega a variavel $set2 que foi recebida em string e divide ela em varias partes, se transformando em um array

    $set1 = array_unique($set1); # Aqui a função de array_unique() tira os elementos repetidos
    $set2 = array_unique($set2); # Aqui a função de array_unique() tira os elementos repetidos


    $set1 = array_map('trim', $set1); # Aqui a função array_map() com 'trim', faz com que os elementos não fiquem com espaços em brancos tanto na direita quanto na esquerda, Ex: " A" vira "A"
    $set2 = array_map('trim', $set2); # Aqui a função array_map() com 'trim', faz com que os elementos não fiquem com espaços em brancos tanto na direita quanto na esquerda, Ex: " A" vira "A"

    $card1 = count($set1); # Aqui conta o numero de elementos nos conjuntos, sendo essa a cardinalidade do primeiro conjunto
    $card2 = count($set2); # Aqui conta o numero de elementos nos conjuntos, sendo essa a cardinalidade do segundo conjunto

    $set1 = array_map('strtoupper', $set1); # Aqui transforma todos os elementos em maiusculos
    $set2 = array_map('strtoupper', $set2); # Aqui transforma todos os elementos em maiusculos


    $setUni = array_merge($set1, $set2); # Aqui junta o primeiro conjunto com o segundo conjunto, sendo essa variavel a uniao
    $setUni = array_unique($setUni); # Aqui elimina as replicatas após a união ser feita
    $cardUni = count($setUni); # Aqui pegamos a cardinalidade da união para calcular o indice de Jaccard
    sort($setUni); # Aqui organiza em ordem descrescente ou numerica

    $setInter = array_intersect($set1, $set2); # Aqui pega a intersecção do primeiro conjunto e do segundo conjunto
    $cardInter = count($setInter); # Aqui pega a cardinalidade da intersecção para o calculo de Jaccard
    sort($setInter); # Aqui organiza em ordem descrescente ou numerica

    $indiceJacc = $cardInter / $cardUni; # Aqui é feito o calculo de Jaccard, Cardinalidade da intersecção / Cardinalidade da União

    $setDifAB = array_diff($set1, $set2); # Aqui pegamos a diferença do primeiro conjunto com o segundo (A - B)

    $setDifBA = array_diff($set2, $set1); # Aqui pegamos a diferença do segundo conjunto com o pirmeiro (B - A)

    $setDifSim = array_merge($setDifAB, $setDifBA); # Aqui juntamos as diferenças, sendo essa a diferença simetrica
    sort($setDifSim); # Aqui organiza em ordem descrescente ou numerica

    $set1 = implode(', ', $set1); # Até aqui estavamos lidando com um array(pense em uma lista), o implode() coloca o ', ' como separador entre os itens do primeiro conjunto
    $set2 = implode(', ', $set2); # Até aqui estavamos lidando com um array(pense em uma lista), o implode() coloca o ', ' como separador entre os itens do segundo conjunto
    $setUni = implode(', ', $setUni); # Até aqui estavamos lidando com um array(pense em uma lista), o implode() coloca o ', ' como separador entre os itens da união dos conjuntos
    $setInter = implode(', ', $setInter); # Até aqui estavamos lidando com um array(pense em uma lista), o implode() coloca o ', ' como separador entre os itens da intersecção dos conjuntos
    $setDifAB = implode(', ', $setDifAB); # Até aqui estavamos lidando com um array(pense em uma lista), o implode() coloca o ', ' como separador entre os itens de A - B
    $setDifBA = implode(', ', $setDifBA); # Até aqui estavamos lidando com um array(pense em uma lista), o implode() coloca o ', ' como separador entre os itens de B - A
    $setDifSim = implode(', ', $setDifSim); # Até aqui estavamos lidando com um array(pense em uma lista), o implode() coloca o ', ' como separador entre os itens da difeença simetrica
    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Set</title>
    <style>
    body { font-family: sans-serif; background: #f4f4f9; padding: 20px; }
    p { color: #333; border-bottom: 2px solid #ddd; padding-bottom: 10px; font-weight: bold;}
    </style>
</head>
<body>
    <p>Conjunto <?php echo $nome1?> = {<?php echo $set1?>} e #<?php echo $nome1?> = <?php echo $card1?></p>
    <p>Conjunto <?php echo $nome2?> = {<?php echo $set2?>} e #<?php echo $nome2?> = <?php echo $card2?></p>
    <p><?php echo $nome1?> ∩ <?php echo $nome2?> = {<?php echo $setInter?>} </p>
    <p><?php echo $nome1?> ∪ <?php echo $nome2?> = {<?php echo $setUni?>}</p>
    <p>#(<?php echo $nome1?> ∩ <?php echo $nome2?>) = <?php echo $cardInter?></p>
    <p>#(<?php echo $nome1?> ∪ <?php echo $nome2?>) = <?php echo $cardUni?></p>
    <p>A Diferença do conjunto <?php echo $nome1?> e <?php echo $nome2?> = {<?php echo $setDifAB?>}</p>
    <p>A Diferença do conjunto <?php echo $nome2?> e <?php echo $nome1?> = {<?php echo $setDifBA?>}</p>
    <p>A Diferença Simetrica do conjunto <?php echo $nome1?> e <?php echo $nome2?> = {<?php echo $setDifSim?>}</p>
    <p>O indice Jaccard: <?php echo "$cardInter / $cardUni = $indiceJacc ou similaridade de " . $indiceJacc * 100 . "%"?></p>
    <a href="index.html">Testar Novamente</a>
</body>
</html>
