<?php
/**
 * Created by PhpStorm.
 * User: Shuaiqiang Yin
 */

require_once "database.config.php";

$mysql_con = mysqli_connect($MySQL ["Host"], $MySQL ["Username"], $MySQL ["Password"], $MySQL ["Database"]);
if (!$mysql_con) {
    die ("MySQL Connection Error");
}
