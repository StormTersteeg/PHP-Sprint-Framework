<?php

function inc($link) {
    if (strpos($link, '.js') !== false) {
        echo "<script>" . file_get_contents($link) . "</script>";
    } else if (strpos($link, '.css') !== false) {
        echo "<style>" . file_get_contents($link) . "</style>";
    } else if (strpos($link, '.php') !== false) {
        include($link);
    }
}