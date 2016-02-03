<?php

/**
 *Important: Read If you are creating connection for first time.
 * Steps:-
 * 1.Create Database "booksDen".
 * 2.Import 'booksden_book.sql' from dev folder to create table
 * 3.Add new user to mysql with following data
 *   -username:devists
 *   -host:localhost
 *   -password:devistsProject
 */

define('DB_SERVER','localhost');//Define Global variable for serverName
define('DB_USER','devists');//Define Global Variable for Database User
define('DB_PASSWORD','devistsProject');//Define Global Variable for Database Password
define('DB_DATABASE','bookDen');//Define Global Variable for Database Name
/**
 * creates database connectio
 * return [mysqli object] returns connection
 */
function getDBConnection(){
    $conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,"");

    if ($conn->connect_error) {
            echo "Unable to Create Connection:".$this->conn->connect_error;
        }

    if(!mysqli_select_db($conn,DB_DATABASE)){
        $query = "CREATE DATABASE ".DB_DATABASE;
        if (!$conn->query($query)) {
            echo "Error: ".$conn->error;
        }
    }

    return $conn;
}

