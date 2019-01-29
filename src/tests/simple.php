<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/29/19
 * Time: 1:16 PM
 */
include dirname(__FILE__).'/../PLog/Autoloader.php';


use PLog\PLogSend;

$model = PLogSend::Send('eLogs', 'salam');

var_dump($model);
?>

