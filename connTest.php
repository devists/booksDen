<?php 
/**
 * This Script only tests mysql connection
 */
 
 include_once ('include/class.books.php');
 $books = new Books();
 echo "<h1>Successfully Created Connection</h1>";