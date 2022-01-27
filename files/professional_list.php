<?php

$q = '';
$q = $_GET["q"];
session_start();
$_SESSION['prof_id'] = $q;

?>