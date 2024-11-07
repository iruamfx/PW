<html data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INTERPOL - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
    <img src="./src/interpol.png" class="w-50 position-absolute z-n1">
    <?php
        $wanteds = array("
                    <div class='card w-25 m-2'>
                        <img class='card-img-top h-50' src='./src/w1.jpg'>
                        <div class='card-body'>
                            <p class='card-text'>SABRINA - TERRORISMO</p>
                        </div>
                    </div>",
                "
                    <div class='card w-25 m-2'>
                        <img class='card-img-top h-50' src='./src/w2.jpg'>
                        <div class='card-body'>
                            <p class='card-text'>PINGU - VENDA DE ARMAS</p>
                        </div>
                    </div>
                ",
                "
                    <div class='card w-25 m-2'>
                        <img class='card-img-top h-50' src='./src/w3.jpg'>
                        <div class='card-body'>
                            <p class='card-text'>RECEBA - RECEBEU</p>
                        </div>
                    </div>
                ",
                "
                    <div class='card w-25 m-2'>
                        <img class='card-img-top h-50' src='./src/w4.jpg'>
                        <div class='card-body'>
                            <p class='card-text'>GATO - DIREÇÃO SEM CNH</p>
                        </div>
                    </div>
                ",
                "
                    <div class='card w-25 m-2'>
                        <img class='card-img-top h-50' src='./src/w5.jpg'>
                        <div class='card-body'>
                            <p class='card-text'>A A FOLOU - STALKING</p>
                        </div>
                    </div>
                "
        );

        if(isset($_POST["update"]))
        {
            shuffle($wanteds);
        }
        if(isset($_POST["invert"]))
        {
            $wanteds = array_reverse($wanteds);
        }
        if(isset($_POST["pop"]))
        {
            array_pop($wanteds);
        }
        if(isset($_POST["shift"]))
        {
            array_shift($wanteds);
        }

        echo(
            "<div class='container d-flex'>"
        );
        foreach($wanteds as $w){
            echo $w;
        }
        echo("</div>");
    ?>
    <div class="container d-flex justify-content-center">
        <form method="post">
            <button class="btn btn-info" type="submit" name="update">ATUALIZAR</button>
            <button class="btn btn-info" type="submit" name="invert">INVERTER</button>
            <button class="btn btn-info" type="submit" name="pop">APAGAR ÚLTIMO</button>
            <button class="btn btn-info" type="submit" name="shift">APAGAR PRIMEIRO</button>
        </form>
    </div>
    <?php echo("<div class='container d-flex justify-content-center'><b>A quantidade de procurados é: " . count($wanteds) . "</b></div>"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
