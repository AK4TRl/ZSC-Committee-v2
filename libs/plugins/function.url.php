<?php
/**
 * Created by PhpStorm.
 * User: LiuACG
 * Date: 2017/3/8
 * Time: 13:54
 */

require_once (dirname(__FILE__) . '/../../phpUri.php');

function smarty_function_url($params)
{
    return phpUri::parse((isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]")->join($params['URL']);
}