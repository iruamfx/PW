<?php
    $post_user = $_POST["user"];
    $auth_user = "admin";
    $post_password = md5($_POST["pass"]);
    $auth_password = md5("123");

    if($post_user === $auth_user && $post_password === $auth_password) {
        header("Location: admin.php");
    }
    else{
        header("Location: index.php");
    }