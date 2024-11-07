<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpCrud - Escola</title>
</head>
<body>
    <h1>Resultado</h1>
    <?php
        $connect = mysqli_connect("127.0.0.1", "root", "");
        mysqli_select_db($connect, "escola2");
        mysqli_set_charset($connect, "UTF8");

        $query = mysqli_query($connect, "SELECT * FROM aluno");
        while($resultset = mysqli_fetch_array($query)) {
            if($resultset[2] == 'm'){
                echo "O aluno " . $resultset[1] . " mora em " . $resultset[3] . "<hr>";
            }else {
                echo "A aluna " . $resultset[1] . " mora em " . $resultset[3] . "<hr>";
            }
        }
    ?>
</body>
</html>