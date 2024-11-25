<?php
    setcookie("cart", "", time() - 3600, "/");
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center">
        <div class="card mt-5" style="width: 18rem; ">
            <div class='card-body'>
                <h5 class='card-title'>Compra finalizada</h5>
                <p class='card-footer'><b><small>Seu pacote será enviado em breve.</small></b></p>
                <p class='card-text'>Agradecemos sua escolha pela <b>EletroCom</b>. Volte Sempre!</p>
                <a href='index.php' class='btn btn-primary'>Voltar</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>