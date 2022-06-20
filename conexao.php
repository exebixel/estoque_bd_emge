<?php

$db_host     = "localhost";
$db_user     = "exebixel";
$db_name     = "estoques_final";
$db_password = "toor";

try {
  $connect = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch (PDOException $e) {
  echo 'ERROR: ' . $e->getMessage();
}
