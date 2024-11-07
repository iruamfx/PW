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
    <h1 class="text-center my-4">Heroes</h1>

    <form action="draw.php" method="post" class="container p-5 rounded-3 my-5 shadow" id="main-form">
        <label class="form-label fs-5 fw-bold" for="univ-select">Universo:</label>
        <select class="form-select form-select-lg my-3 shadow" id="univ-select" name="univ_select">
            <option value="marvel">Marvel</option>
            <option value="dccom">DC Comics</option>
        </select>
        <label class="form-label fs-5 fw-bold" for="hero-name">Nome do herói:</label>
        <input type="text" class="form-control form-control-lg my-2 shadow" id="hero-name" name="hero_name">
        <label class="form-label fs-5 fw-bold" for="hero-name">Repetições:</label>
        <input type="text" class="form-control form-control-lg my-2 shadow" id="hero-itr" name="hero_itr">
        <input class="btn btn-danger btn-lg shadow form-control" type="submit"> 
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>