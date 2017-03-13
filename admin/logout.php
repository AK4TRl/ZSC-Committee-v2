<?php

session_start();

require_once(dirname(__FILE__) . '/../setup.php');

unset($_SESSION);

session_destroy();

header('location: /admin/login.php');

