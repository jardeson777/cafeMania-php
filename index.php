<?php

define("PATH", __DIR__);

require_once  'src/utils/php/utils.php';

use utils\UtilsController;

$utils = new UtilsController();
$utils->VerificaSession("./src/view/loginView.php");
