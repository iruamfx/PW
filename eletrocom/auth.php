
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body>
<?php  
session_start(); // Inicia a sessão ou retoma a sessão existente

// Credenciais fixas (para fins de demonstração)
$valid_username = "iruam";
$valid_password_hash = md5("traquinagens"); // Senha "cps@senha" criptografada em MD5

// Recebe dados do formulário
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Verifica se as credenciais estão corretas
if ($username === $valid_username && md5($password) === $valid_password_hash) {
    $_SESSION['loggedin'] = true; // Marca o usuário como logado
    $_SESSION['username'] = $username; // Armazena o nome de usuário na sessão
    header("Location: index.php"); // Redireciona para a página restrita
    exit(); // Garante que o redirecionamento ocorra e o script pare aqui
} else {
    echo "<div class='d-flex justify-content-center'>
        <div class='card mt-5' style='width: 18rem; ''>
            <div class='card-body bg-danger'>
                <h5 class='card-title'>O log in falhou.</h5>
                <p class='card-footer'><b><small>Certifique-se de que o usuário e senha estão corretamente inseridos.</small></b></p>
                <a href='login.php' class='btn btn-primary'>Tentar novamente</a>
            </div>
        </div>
    </div>";
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>