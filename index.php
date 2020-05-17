<?php session_start();

// SETTINGS
include("sprint/settings.php");

// FORCE HTTPS
if ($use_forced_https) {
    echo '
        <script>
            if (location.protocol !== "https:") {
                location.replace(`https:${location.href.substring(location.protocol.length)}`);
            }
        </script>
    ';
}

// INCLUDE INTERNAL FUNCTIONS
include("sprint/functions.php");

// COLLECT PARAMETERS
if (isset($_GET['page'])) { $page = $_GET['page']; } else { header("Refresh: 0; url={$default_area}"); exit; }
if (isset($_GET['param'])) { $param = $_GET['param']; }

// OPEN DOCUMENT
echo '
<!DOCTYPE html><html lang="en"><head><meta charset="utf-8">
<meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
<!--SPRINT3 DAEMONITE-MATERIAL-->
';

include("sprint/styles.php");

// INCLUDE PARTIALS
if ($page=='home') {
    // include("sprint/partials/navbar.php");
} else if ($page=='admin') {
    if (isset($_SESSION["loggedin"])) {
        // include("sprint/partials/admin_navbar.php");
    } else {
        // $page = '404';
    }
}

// SERVE VIEW
if (isset($page) & file_exists("areas/" . $page . "/views/index.php"))
{
    include("areas/" . $page . "/views/index.php");
}
else if (isset($page) & file_exists("areas/" . $page . "/views/index.html"))
{
    include("areas/" . $page . "/views/index.html");
}
else
{
    include("areas/404/index.html");
}

// Include Scripts (load at bottom to prevent render blocking)
echo "<project-scripts>";
include("sprint/scripts.php");
echo "</project-scripts>";

// ADD PRODUCT ICONS
echo '
<link rel="apple-touch-icon" href="assets/logo.png">
<link rel="icon" type="image/png" href="assets/favicon.png"/>
';
?>