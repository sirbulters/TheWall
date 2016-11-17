<?php
/**
 * Created by PhpStorm.
 * User: jorisbulters
 * Date: 01-04-15
 * Time: 13:40
 */

//$mysqli = new mysqli('localhost','root','','acme');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($mysqli->connect_errno) {
    echo 'Failed to connect to MySQL: ( ' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
} //else
    //echo 'ok';