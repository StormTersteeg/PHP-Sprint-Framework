<?php
// App settings
$project_version = 1;
$execution_mode = 'strict'; // quiet - oblivious - strict
$resource_blacklist = ["controller"];
$use_resource_stacking = TRUE;
$use_forced_https = FALSE;

// Database settings
$database_model = 'local';
$database_credentials = array(
  'local' => array('localhost', 'root', ''),
  'production' => array('localhost', 'root', '')
);