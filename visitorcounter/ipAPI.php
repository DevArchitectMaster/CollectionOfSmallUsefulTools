<?php

    if (!isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $client_ip = $_SERVER['REMOTE_ADDR'];
    } else {
        $client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    echo $client_ip;

?>