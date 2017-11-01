<?php

$optionsDB = require '../config/database.php';

return new \Lib\Medoo\Medoo($optionsDB);