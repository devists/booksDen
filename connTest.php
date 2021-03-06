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
$books->add_records($insert_data);
$isbn="	9780132990448";
$books->update_edition($isbn,7);
$books->delete_record($isbn);
$books->bookExist(3);
$books->getAuthorName(278);
$books->authorsList();
$books->booksList();
$books->getBooksCount();
$authorName = "Paul Dietel & Harvey";
$books->books_by_author($authorName);
$categoryName = "programming";
$books->books_by_category($categoryName);
$p_year = "2016-02-07 00:02:19";
$books->books_by_p_year($p_year);
$books->books_sortby_up_date();
$books->books_sortby_p_year();
$books->books_sortby_title();
$books->books_by_rating(4);
$publisher = "MISSING MANUAL";
$books->books_by_publisher($publisher);
$books->books_by_lang("english");
$books->parse_tags("english;hindi;janju;kamina");
$books->update_tags($isbn,"test1;test2;test3");
$books->books_by_tag("WEB");