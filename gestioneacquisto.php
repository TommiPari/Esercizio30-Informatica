<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <?php
        $codiciSconto = array("FIRENZE5" => 0.95);
        $prezzo = array("curva" => 30, "centrale" => 80, "onore" => 80);
        $numBigliettiAggiuntivi = intval($_POST["numBiglietti"]);
    ?>
<div class="titolo">
        <h1>Listino prezzi:</h1>
        <h3>Curva: 30€</h3>
        <h3>Tribuna centrale: 80€</h3>
        <h3>Tribuna d'onore: 120€</h3>
    </div> <br>
    <div class="divForm">
        <p>Nome: <?php echo $_POST["nome"];?></p>
        <p>Cognome: <?php echo $_POST["cognome"];?></p>
        <p>Codice fiscale: <?php echo $_POST["cf"];?></p>
        <p>Data d'acquisto: <?php echo date("d-m-Y H:i");?></p>
        <p>Biglietti acquistati: <?php echo $numBigliettiAggiuntivi + 1;?></p>
        <?php
            if ($_POST["modalita"] == "piuBiglietti") {
                for ($i=1; $i<=$numBigliettiAggiuntivi; $i++) {
                    echo "<p>Codice fiscale ". ($i). ": ". $_POST["cf".$i]. "</p>";
                }
            }
        ?>
        <h3>Prezzo finale: <?php 
            if (!$_POST["sconto"]) {
                echo $prezzo[$_POST["settore"]] + ($prezzo[$_POST["settore"]] * $numBigliettiAggiuntivi);
            } elseif (array_key_exists($_POST["sconto"], $codiciSconto)) {
                echo ($prezzo[$_POST["settore"]] + ($prezzo[$_POST["settore"]] * $numBigliettiAggiuntivi)) * $codiciSconto[$_POST["sconto"]];
            } else {
                echo "<span style='color:red;'>Codice sconto non valido</span>";
            }
        ?>€</h3> 
        <a href="./index.html">Torna indietro</a>
    </div>
    <br>
</body>
</html>