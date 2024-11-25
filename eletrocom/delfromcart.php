<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");    

    $cookieset = false;
    $cookie_name = "cart";

    if(isset($_COOKIE[$cookie_name])) {

        $cookie_val = json_decode($_COOKIE[$cookie_name], true);

        if(count($cookie_val) <= 1)
        {
            setcookie($cookie_name, "", time() - 3600, "/");
            header("Location: index.php");
            exit();
        }
        
        array_splice($cookie_val, $_POST["prodid"], 1);

        //setcookie($cookie_name, json_encode($cookie_val), time() + (86400), "/"); // 86400 = 1 day

        setcookie($cookie_name, json_encode($cookie_val), time() + (30), "/"); // 86400 = 1 day
        $cookieset = true;
    }else
    {
       header("Location: index.php");
       exit();
    }

    if($cookieset == true)
    {
       header("Location: index.php");
       exit();
    }