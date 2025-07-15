<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par ou Impar</title>
</head>

<body>
<body>
    <form method="post" action="">
        <label for="numero">Numero </label>
        <input type="number" id="impar" name="impar" required>
        <button type=" submit" name="verificar_impar">Verificar</button>
    </form>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['verificar_impar'])){
            $numero = $_POST['impar'];
            echo $numero;

            $impar = true;
                    if($numero % 2 == 0){
                        $impar = false;
                    };
            echo "<br>";
            echo "O número $numero é " . ($impar ? 'impar' : 'par');
        };
    };


    ?>


</body>

</body>

</html>