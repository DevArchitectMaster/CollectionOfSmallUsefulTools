<?php

    /* POST: increment counter */
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if((isset($_POST['customerKey']) && !empty($_POST['customerKey'])) && (isset($_POST['counter']) && !empty($_POST['counter']))) {
            $file = "counter/".$_POST['customerKey'].".txt";
            $content = $_POST['counter'];
            
            if(is_file($file)) {
                $content = file_get_contents($file);
                $content = intval($content) + 1;
                file_put_contents($file, $content);
            } else {
                file_put_contents($file, $content);
            }
        }
    }

    /* GET: read counter */
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if((isset($_SERVER['REQUEST_URI']) && !empty($_SERVER['REQUEST_URI'])) && (isset($_GET['customerKey']) && !empty($_GET['customerKey']))) {
            $uri = $_SERVER['REQUEST_URI'];
            $file = "counter/".$_GET['customerKey'].".txt";
            if(is_file($file)) {
                $content = file_get_contents($file);
            } else {
                $content = "=== ERROR 404: customerKey counter does not exist ===";
            }
            header('Content-Type: text/plain');
            //header($content);
            echo $content;
        }
    }
?>