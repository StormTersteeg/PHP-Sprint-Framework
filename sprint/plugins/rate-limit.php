<?php
$marker = date("s");

if (isset($_SESSION['rate-limit-stamp'])) {
  if ($_SESSION['rate-limit-stamp']!=$marker) {
    $_SESSION['rate-limit-stamp'] = $marker;
    $_SESSION['rate-limit-count'] = 1;
  } else {
    $_SESSION['rate-limit-count'] = $_SESSION['rate-limit-count'] + 1;
  }
} else {
  $_SESSION['rate-limit-stamp'] = $marker;
  $_SESSION['rate-limit-count'] = 1;
}

if ($_SESSION['rate-limit-count']>$rate_limit) {exit;}