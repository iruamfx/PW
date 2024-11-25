<?php
	session_start(); 

	if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
		header("Location: login.php"); // Redireciona para a página de login se não estiver autenticado
		exit(); // Garante que o redirecionamento ocorra e o script pare aqui
	}

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en" class="h-100" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EletroCom</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="icon" href="src/logo.png">
</head>

<body class="text-center text-white">
	<nav class="navbar navbar-expand-lg rounded" style="background-color: #088484;">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="src/logo.png" style="width: 40px"></a>
        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <b><p class="my-2">EletroCom STORE</p></b>
            </li>
		   </ul>
		   <ul class="navbar-nav">
		   <a class='btn btn-danger' href="logout.php">Sair</a>
		   <?php
		//    FOR NO COOKIE PARA OS LI
				if(isset($_COOKIE["cart"])){
					echo "
					<li class='nav-item'>
						<div class='dropdown dropstart'>
						<button class='btn dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
							<img src='src/cart.png' style='width: 32px; height: 25px;'>
						</button>
							<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>";
								$cartstatus = json_decode($_COOKIE["cart"], true);
								$cartstatitr = 0;
								$totalval = 0;
								while($cartstatitr < count($cartstatus))
								{
									echo "<li>
										<a class='dropdown-item' style='background-color: #454952'>". $cartstatus[$cartstatitr]["nome"] ."</a>
										<a class='dropdown-item'> R$". $cartstatus[$cartstatitr]["valor"] ."</a>
										<div class='d-flex'>
										<form action='delfromcart.php' method='post'>
											<input name='prodid' value='" . $cartstatitr . "' hidden> 
											<button class='btn btn-sm btn-danger mx-2 mt-2' formmethod='post'>Excluir</button>
										</form>
										<form action='checkprod.php' method='post'>
											<input name='prodid' value='" . $cartstatitr . "' hidden> 
											<button class='btn btn-sm btn-primary mx-2 mt-2' formmethod='post'>Conferir</button>
										</form>
										</div>
									</li>";
									echo "<li><hr class='dropdown-divider'></li>";
									$totalval += $cartstatus[$cartstatitr]["valor"];
									$cartstatitr++;
								// <li><a class='dropdown-item' href='#'>Action</a></li>
								// <li><hr class='dropdown-divider'></li>
								// <li><a class='dropdown-item' href='#'>Another action</a></li>
								// <li><a class='dropdown-item' href='#'>Something else here</a></li>
								}
					echo "
								<li><a class='dropdown-item' style='background-color: #454952'> Valor Total: R$". $totalval ."</a></li>
								<li><hr class='dropdown-divider'></li>
								<li><a class='dropdown-item bg-primary' href='checkout.php'>Fechar compra</a></li>
							</ul> 
						</div>
					</li>";
					//<li><div class='d-flex justify-content-center'><a class='btn btn-sm btn-primary' href='#'>Fechar compra</a></div></li>
				}
			?>

          </ul>
        </div>
      </div>
    </nav>

	<div class="d-flex align-items-center p-3 my-3 text-white rounded shadow-sm container-sm" style="background-color: #085184;">
		<img class="me-3" src="src/50off.png" alt="" width="48" height="48">
    	<div class="lh-1">
      		<b><h1 class="h6 mb-0 text-white lh-1">PROMOÇÃO DIA DO ENGENHEIRO</h1></b>
      		<small>Até <b>50%</b> de desconto em eletrônicos!</small>
    	</div>
 	 </div>
	
	<div class="album py-5">
    <div class="container">
	<div class="row gap-3">
	  <?php
	  			// if(isset($_COOKIE["cart"]))
				// {
				// 	var_dump(json_decode($_COOKIE["cart"]));
				// }
				$connect = mysqli_connect("127.0.0.1","root","");
				mysqli_select_db($connect, "ecomdb");
				mysqli_set_charset($connect,"UTF8");

				$query = mysqli_query($connect, "SELECT * FROM produtos");
				while($result = mysqli_fetch_array($query)){
					echo "
						<div class='col'>
						<div class='card shadow-sm' style='width: 25rem'>
							<img class='card-img-top' width='100%' height='225' role='img' src='" . $result[4] . "'>
							<div class='card-body'>
								<h5 class='card-title'>" . $result[1] . "</h5>
								<p class='card-text text-start'>" . $result[2] . "</p>
								<p class='card-footer'><b><small>R$" . $result[3] . "</small></b></p>
								<div class='d-flex justify-content-between align-items-center'>
									<div class='btn-group'>
									<form action='addtocart.php' method='post'>
										<input name='prodid' value='" . $result[0] . "' hidden>
										<button class='btn btn-sm btn-outline-secondary' type='submit' formmethod='post'>Adicionar ao carrinho</button>
									</form>
									</div>
								</div>
							</div>
						</div>
						</div>
					";
				}
				?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>