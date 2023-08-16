<?php

function connect_db()
{
    $servername = "localhost";
    $userName = "root";
    $passwd = "";
    $nameDB = "DatabasesLaptop";
    $cn = new mysqli(
        $servername,
        $userName,
        $passwd,
        $nameDB
    );
    if ($cn->connect_errno) {
        echo $cn->connect_error;
        exit();}
    return $cn;
}
