<?php

// SETTINGS
$use_resource_stacking = TRUE;

// COLLECT PARAMETERS
if (isset($_GET['page'])) { $page = $_GET['page']; } else { header("Refresh: 0; url=home"); exit; }
if (isset($_GET['param'])) { $param = $_GET['param']; }
include("sprint/functions.php");

// OPEN DOCUMENT
echo '
    <!DOCTYPE html><html lang="en"><head><meta charset="utf-8">
    <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
    <!--SPRINT3 DAEMONITE-MATERIAL-->
';

include("sprint/styles.php");

// ADD PRODUCT ICONS AND CLOSE HEADER
echo '
    <link rel="apple-touch-icon" href="assets/logo.png">
    <link rel="icon" type="image/png" href="assets/favicon.png"/>
';

// SERVE VIEW
if ($_GET['page']!="bewerk") { include("sprint/partials/navbar.php"); }
if (isset($page) & file_exists("areas/" . $page . "/views/index.php"))
{
    include_once("areas/" . $page . "/views/index.php");
}
else if (isset($page) & file_exists("areas/" . $page . "/views/index.html"))
{
    include_once("areas/" . $page . "/views/index.html");
}
else
{
    include_once("areas/404/index.html");
}

// Include Scripts (load at bottom to prevent render blocking)
echo "<project-scripts>";
include("sprint/scripts.php");
echo "</project-scripts>";
?>