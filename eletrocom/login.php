<?php
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
        </div>
      </div>
    </nav>
    <div class="modal d-flex align-items-center">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                        <h1 class="fw-bold fs-2">EletroCom - Log in</h1>
                </div>
                <div class="modal-body">
                    <form action="auth.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-3" id="floatingInput" name="username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="floatingPassword" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>