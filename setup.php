<?php

//header("Content-type:text/html;charset=UTF-8");

define("WEB_ROOT", dirname(__FILE__));

define("SALT", '$2a$07$DN8XiFRAIcnoGhhEk4Vs1RSLV4qShKEq$');

define("DB_NAME", 'zsc-party');
define("DB_HOST", "localhost");
define("DB_USER", "homestead");
define("DB_PSW", "secret");
define("DB_DSN", 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8');

define('SEARCH_PAGE_LMT', 10);
define('MSG_LIMIT', 10);

// == Begin Smarty Template Engine ==
require_once(WEB_ROOT . '/libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

$smarty->setTemplateDir(WEB_ROOT . '/Smarty/templates/');
$smarty->setCompileDir(WEB_ROOT . '/Smarty/templates_c/');
$smarty->setConfigDir(WEB_ROOT . '/Smarty/configs/');
$smarty->setCacheDir(WEB_ROOT . '/Smarty/cache/');
// == End Smarty Template Engine ==
