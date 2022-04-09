<?php session_start();

// SETTINGS & CORE
include("sprint/settings.php");
include("sprint/services.php");
include("sprint/core/functions.php");
include("sprint/core/classes.php");

// COLLECT PARAMETERS
$page = (isset($_GET['page'])) ? $_GET['page'] : "index";
$sub_page = (isset($_GET['sub_page'])) ? $_GET['sub_page'] : false;

// SERVE RESOURCES IF $page IS NOT PRESENT IN THE RESOURCE BLACKLIST
$serve_resources = (!in_array($page, $resource_blacklist)) ? true : false;

if ($serve_resources)
{
  // FORCE HTTPS
  if($use_forced_https) {
    echo '
      <script>
      if (location.protocol !== "https:") {
        location.replace(`https:${location.href.substring(location.protocol.length)}`);
      }
      </script>
    ';
  }

  // OPEN DOCUMENT
  echo '
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">
      <!-- SPRINT 3.7 -->
  ';

  // INCLUDE PRELOAD
  include("sprint/resource-preload.php");
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

if ($serve_resources)
{
  // INCLUDE AFTERLOAD
  echo "<project-scripts>";
  include("sprint/resource-afterload.php");
  echo "</project-scripts>";

  // ADD PRODUCT ICONS
  echo '
    <link rel="icon" type="image/png" href="assets/favicon.png"/>
    <link rel="apple-touch-icon" href="assets/icon.png">
  ';
}
?>