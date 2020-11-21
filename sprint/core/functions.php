<?php

function import($link) {
    if ($GLOBALS['use_resource_stacking']==TRUE) {
        if (strpos($link, '.js') !== false) {
            echo "<script>" . file_get_contents($link) . "</script>";
        } else if (strpos($link, '.css') !== false) {
            echo "<style>" . file_get_contents($link) . "</style>";
        } else if (strpos($link, '.php') !== false) {
            include($link);
        }
    } else {
        if (strpos($link, '.js') !== false) {
            echo '<script src="' . $link . '"></script>';
        } else if (strpos($link, '.css') !== false) {
            echo '<link rel="stylesheet" type="text/css" href="' . $link . '">';
        } else if (strpos($link, '.php') !== false) {
            include($link);
        }
    }
}