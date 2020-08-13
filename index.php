<?php session_start();

// SETTINGS & FUNCTIONS
include("sprint/settings.php");
include("sprint/core/functions.php");

// COLLECT PARAMETERS
$page = (isset($_GET['page'])) ? $_GET['page'] : "index";
$param = (isset($_GET['param'])) ? $_GET['param'] : false;
$serve_content = (!in_array($page, $content_blacklist)) ? true : false;

if ($serve_content)
{
  // FORCE HTTPS
  if(isset($_SERVER['HTTPS']) && $use_forced_https) {
    echo '
      <script>
        location.replace(`https:${location.href.substring(location.protocol.length)}`);
      </script>
    ';
  }

  // OPEN DOCUMENT
  echo '<!DOCTYPE html><html lang="en"><head><meta charset="utf-8">
  <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
  <!-- SPRINT3.2 --><link rel="apple-touch-icon" href="assets/logo.png">';

  // INCLUDE STYLESHEETS
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
  include("areas/404/index.php");
}

if ($serve_content)
{
  // INCLUDE SCRIPTS
  echo "<project-scripts>";
  include("sprint/scripts.php");
  echo "</project-scripts>";

  // ADD PRODUCT ICON
  echo '<link rel="icon" type="image/png" href="assets/favicon.png"/>';
}
?>