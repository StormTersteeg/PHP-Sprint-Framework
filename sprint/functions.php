<?php

function inc($link) {
    if (strpos($link, '.js') !== false) {
        echo "<script src=" . $link . "></script>";
    } else if (strpos($link, '.css') !== false) {
        echo "<link href='" . $link . "' rel='stylesheet'>";
    } else if (strpos($link, '.php') !== false) {
        include($link);
    } else {
        echo "<link href='" . $link . "' rel='stylesheet'>";
    }
}