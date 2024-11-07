<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heroes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="text-center my-4">Heroes: Drawn</h1>
    <?php
        $univ = $_POST["univ_select"];
        $heroName = $_POST["hero_name"];
        $heroItr = $_POST["hero_itr"];

        function drawHero($url, $maxItr) //Não é possivel pegar a variavel $heroItr pois ela não existe no momento da inicialização da função
        {
            for($i = 0; $i < $maxItr; $i++){
                echo "<img src='$url' width='300px'>";
            }
        }

        if($univ == "marvel"){
            switch(strtolower($heroName)){
                case "homem de ferro":
                    drawHero("src/tonystark.jpg", $heroItr);
                break;
                case "capitao america":
                    drawHero("src/captainamerica.jpg", $heroItr);
                break;
                case "hulk":
                    drawHero("src/hulk.webp", $heroItr);
                break;
                case "homem aranha":
                    drawHero("src/spiderman.jpg", $heroItr);
                break;
                case "peter quill":
                    drawHero("src/peterquill.jpg", $heroItr);
                break;
                default:
                    echo("<b><h3 class='container text-center pt-5'>O heroi solicitado não existe ou não pertence a este universo.</h3></b>");
                    echo("<div class='text-center'><a href='index.php' class='btn btn-danger mt-5'>Retornar</a></div>");
                break;
            }
        } else
        {
            switch(strtolower($heroName)){
                case "superman":
                    drawHero("src/superman.jpg", $heroItr);
                break;
                case "mulher maravilha":
                    drawHero("src/wonderwoman.jpg", $heroItr);
                break;
                case "batman":
                    drawHero("src/batman.jpg", $heroItr);
                break;
                case "aquaman":
                    drawHero("src/aquaman.jpg", $heroItr);
                break;
                case "rorschach":
                    drawHero("src/rorschach.jpg", $heroItr);
                break;
                default:
                    echo("<b><h3 class='container text-center pt-5'>O heroi solicitado não existe ou não pertence a este universo.</h3></b>");
                    echo("<div class='text-center'><a href='index.php' class='btn btn-danger mt-5'>Retornar</a></div>");
                break;
            }
        }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>