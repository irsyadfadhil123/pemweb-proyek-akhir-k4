<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if (!session_id()) session_start();
require_once '../app/init.php';

$app = new App;