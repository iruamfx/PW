<?php
    $connect = mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($connect, "ecomdb");
    mysqli_set_charset($connect,"UTF8");

    $sql = "SELECT * FROM produtos WHERE id = " . $_POST["prodid"];
    $query = mysqli_query($connect, "SELECT * FROM produtos WHERE id = " . $_POST["prodid"]);
    $result = mysqli_fetch_array($query, MYSQLI_ASSOC);

    $cookie_name = "cart";
    $cookieset = false;

    if(isset($_COOKIE[$cookie_name])) {
        $cookie_val = json_decode($_COOKIE[$cookie_name], true);
        var_dump($cookie_val);
        $cookie_val[] = $result;
        //setcookie($cookie_name, json_encode($cookie_val), time() + (86400), "/"); // 86400 = 1 day
        setcookie($cookie_name, json_encode($cookie_val), time() + (30), "/"); // 86400 = 1 day
        $cookieset = true;
        var_dump($_COOKIE[$cookie_name]);
    }else {
        //setcookie($cookie_name, json_encode($result), time() + (86400), "/"); // 86400 = 1 day
        $cookie_val = [$result];

        setcookie($cookie_name, json_encode($cookie_val), time() + (30), "/"); // 86400 = 1 day
        $cookieset = true;
    }

    if($cookieset == true)
    {
        header("Location: index.php");
    }