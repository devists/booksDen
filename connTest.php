<?php 
/**
 * This Script only tests mysql connection
 */
 
 include_once ('include/class.books.php');
/*
make asoociative array for testing
*/
$insert_data = array("isbn"=>"278914", "up_date"=>"2016-02-06 18:07:57", "title"=>"C How to Program","author"=>"Paul Dietel & Harvey","publisher"=>"\0","p_year"=>"2016-02-06 18:07:57","edition"=>"7","lang"=>"English","category"=>"programming","tags"=>"c how to program","pages"=>"10","rating"=>"","comment"=>"","count"=>"0");
 $books = new Books();
  echo "<h1>Successfully Created Connection</h1>";
 // $books->add_records($insert_data);
 // $isbn="278914";
 // $books->update_edition($isbn);
 // $books->delete_record($isbn);
$books->bookExist(3);