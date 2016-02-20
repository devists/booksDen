<?php 
include_once ('config.db.php');
/**
 * This class contains function to interact with database for Books
 */
class Books
{
	public $conn;
	/**
	 * Constructor Creates Database Connection
	 */
	function __construct()
	{
		$this->conn = getDBConnection();
	}
    /*
    * Adds new record to the database
    * @param {array} $info contains datails of record 
    * @return isbn on success else 0
    */
    function add_records($info)
    {
        $data="INSERT INTO booksden_book (isbn,up_date,title,author,publisher,p_year,edition,lang,category,tags,pages,rating,comment,count) VALUES ('$info[isbn]','$info[up_date]','$info[title]', '$info[author]', '$info[publisher]', '$info[p_year]', '$info[edition]', '$info[lang]', '$info[category]', '$info[tags]', '$info[pages]', '$info[rating]', '$info[comment]', '$info[count]')";
        
        if($this->conn->query($data) == true)
        {
            echo "<h3>New record create successfuly</h3>";
            return $info['isbn'];
        }
        else
        {
            echo "error in insertion" . $this->conn->error;
            return 0;
        }
    }
    /*
    * updates new record to the database
    * @param {int} $isbn of record 
    * @return isbn on success else 0
    */
    function update_edition($isbn,$edition)
    {
        $update_data = "UPDATE booksden_book SET edition=$edition WHERE isbn=$isbn";

        if ($this->conn->query($update_data) === TRUE)   
        {
            echo "<h3>Edition of book $isbn updated successfully</h3>";
            return $isbn;
        } 
        else 
        {
            echo "Error updating edition: " . $this->conn->error;
            return 0;
        }
    }
    /*
    * delete record to the database
    * @param {int} $isbn of record 
    * @return isbn on success else 0
    */
    function delete_record($isbn)
    {
        $delete = "DELETE FROM booksden_book WHERE isbn=$isbn";

        if ($this->conn->query($delete) === TRUE)
        {
            echo "<h3>Record deleted successfully</h3>";
            return $isbn;
        }       
        else 
        {
            echo "Error deleting record: " . $this->conn->error;
            return 0;
        }
    }

    /**
     * Checks if book Exist in database
     * @param  {int} $isbn of books
     * @return {bool}       returns true on success else false
    */
    function bookExist($isbn)
    {   
        $res='';
        $query="SELECT * FROM booksden_book WHERE isbn=$isbn";
        $res=$this->conn->query($query);
        if (!$res->num_rows) {
            echo "<h4>Book Doesn't Exist</h4>";
            return 0;
        }
        else {
            echo "<h4>Book Exist</h4>";
            return 1;
        }
    }

    /**
     * Returns author name of perticular book
     * @param  {int} $isbn of book
     * @return author name on success else 0
     */
    function getAuthorName($isbn)
    {
        $res='';
        $query="SELECT author FROM booksden_book WHERE isbn=$isbn";
        $res=$this->conn->query($query);
        if (!$res->num_rows) {
            echo "<h4>Author Doesn't Exist</h4>";
            return 0;
        }
        else {
            $author = $res->fetch_assoc()['author'];
            echo "Author Name: <b>$author</b>";
            return $author;
        }   
    }

    /**
     * Returns list of author in database
     * @return {arr} returns array of author
     */
    function authorsList()
    {
        $res='';
        $authorsArr=array();
        $query="SELECT author FROM booksden_book WHERE 1";
        $res=$this->conn->query($query);
        if (!$res->num_rows) {
            echo "<h4>No Records Exist</h4>";
            return 0;
        }
        else {
            echo "<h3>Authors Name</h3>";

            while ($author= $res->fetch_assoc()) {
                array_push($authorsArr, $author['author']);
            }
            print_r($authorsArr);
            return $authorsArr;
        }        
    }

    /**
     * Returns list of Books in database
     * @return {arr} returns array of Books Name
     */
        function booksList()
        {
            $res='';
            $booksArr=array();
            $book='';
            $query="SELECT title FROM booksden_book WHERE 1";
            $res=$this->conn->query($query);
            if (!$res->num_rows) {
                echo "<h4>No Records Exist</h4>";
                return 0;
            }
            else {
                echo "<h3>Books Name</h3>";

                while ($book= $res->fetch_assoc()) {
                    array_push($booksArr, $book['title']);
                }
                print_r($booksArr);
                return $booksArr;
            }
        }


    /**
     * Returns no. of books in Database
     * @return {integer} returns no. of books in databse on success else 0
     */
    function getBooksCount()
    {   
        $res='';
        $count='';
        $query="SELECT COUNT(*) FROM booksden_book";
        $res=$this->conn->query($query);
        $count = $res->fetch_assoc()['COUNT(*)'];
        if (!$count) {
            echo "<h4>No Records Exist</h4>";
            return 0;
        }
        else {
            print_r("<h4>Total no Books In Database: $count</h4>");
            return $count;
        }        
    }
    /*
    * sort database table according to update year
    * @return array of sorted books else 0
    */
    function books_sortby_up_date()
    {
        $booksSorted=array();
        $query="SELECT * FROM booksden_book ORDER BY up_date";
        $res=$this->conn->query($query);
        if (!$res->num_rows) {
            echo "<h4>No Records Exist</h4>";
            return 0;
        }
        else
        {
            echo "<h3>Sorted all books detailed according to up_date</h3>";
            while ($book= $res->fetch_assoc()) {
                   array_push($booksSorted,$book);
                }
        print_r($booksSorted);}
        return $booksSorted;
    }
    /*
    * sort database tabl e according to publication year
    * @return array of sorted books else 0
    */
    function books_sortby_p_year()
    {
        $booksSorted=array();
        $query="SELECT * FROM booksden_book ORDER BY p_year";
        $res=$this->conn->query($query);
        if (!$res->num_rows) {
            echo "<h4>No Records Exist</h4>";
            return 0;
        }
        else
        {
            echo "<h3>Sorted all books detailed according to publication year</h3>";
            while ($book= $res->fetch_assoc()) {
                   array_push($booksSorted,$book);
                }
        print_r($booksSorted);}
        return $booksSorted;
    }
    /*
    * sort database table according to title
    * @return array sorted books else 0
    */
    function books_sortby_title()
    {
        $booksSorted=array();
        $query="SELECT * FROM booksden_book ORDER BY title";
        $res=$this->conn->query($query);
        if (!$res->num_rows) {
            echo "<h4>No Records Exist</h4>";
            return 0;
        }
        else
        {
            echo "<h3>Sorted all books detailed according to bookname(title)</h3>";
            while ($book= $res->fetch_assoc()) {
                   array_push($booksSorted,$book);
                }
        print_r($booksSorted);}
        return $booksSorted;
        
    }
    /**
     * returns books by particular author 
     * @param  string $authorName [Name of the author]
     * @return [array]             [on success,returns details of the book by that author, else 0]
     */
    function books_by_author($authorName)
    {
    	$res = '';
    	$bookArr = array();
    	$book = '';
    	$query = "SELECT * FROM booksden_book WHERE author = '$authorName'";
    	$res = $this->conn->query($query);
    	if(!$res->num_rows){
    		echo"<h4> No Records Exist </h4>";
    		return 0;
    	}
    	else{
    		echo "<h3>Books Detail (author)</h3>";

    		while($book = $res->fetch_assoc()){
    			array_push($bookArr,$book);
    		}
    		print_r($bookArr);
    		return $bookArr;
    	}

    }
    /**
     * returns the books of a particular category
     * @param  [string] $categoryName [Name of the category]
     * @return [Array]               [returns detail of the books of a particular category on success, else 0]
     */
    function books_by_category($categoryName)
    {
    	$res = '';
    	$bookArr = array();
    	$book = '';
    	$query = "SELECT * FROM booksden_book WHERE category = '$categoryName'";
    	$res = $this->conn->query($query);
    	if(!$res->num_rows){
    		echo"<h4> No Records Exist </h4>";
    		return 0;
    	}
    	else{
    		echo "<h3>Books Detail (by category)</h3>";

    		while($book = $res->fetch_assoc()){
    			array_push($bookArr,$book);
    		}
    		print_r($bookArr);
    		return $bookArr;
    	}

    }
    /**
     * returns  the books published in a particular year
     * @param  string $p_year [timestamp of p_year]
     * @return array         returns the detail of books published in a particular year on success, else 0 
     */
    function books_by_p_year($p_year)
    {
    	$res = '';
    	$bookArr = array();
    	$book = '';
    	$query = "SELECT * FROM booksden_book WHERE p_year = '$p_year'";
    	$res = $this->conn->query($query);
    	if(!$res->num_rows){
    		echo"<h4> No Records Exist </h4>";
    		return 0;
    	}
    	else{
    		echo "<h3>Books Detail (by p_year)</h3>";

    		while($book = $res->fetch_assoc()){
    			array_push($bookArr,$book);
    		}
    		print_r($bookArr);
    		return $bookArr;
    	}

    }
    /**
     * returns  the books published in a particular language
     * @param  string $lang [language of book]
     * @return array         returns the detail of books published in a particular year on success, else 0 
     */
    function books_by_lang($lang)
    {    
        $bookArr = array();
        $book ='';
        $query = "SELECT * FROM booksden_book WHERE lang ='$lang'";
        $res = $this->conn->query($query);
        if(!$res->num_rows)
        {
            echo"<h4> No Records Exists </h4>";
            return 0;
        }
        else
        {
            echo "<h3>Books Detail (by lang)</h3>";

            while($book = $res->fetch_assoc()){
            array_push($bookArr,$book);
            }
            print_r($bookArr);
            return $bookArr;
        }
    }
                  
    /**
     * returns  the books published having perticular rating
     * @param  string $rating [rating of book]
     * @return array         returns the detail of books having perticular rating on success, else 0 
     */
    function books_by_rating($rating)
    {
        if($rating>=0 && $rating <= 5)
        {
            $bookArr = array();
            $book ='';
            $query = "SELECT * FROM booksden_book WHERE rating ='$rating'";
            $res = $this->conn->query($query);
            if(!$res->num_rows)
            {
                echo"<h4> No Records Exists </h4>";
                return 0;
            }
            else {
                echo "<h3>Books Detail(by rating)</h3>";

                while($book = $res->fetch_assoc()){
                    array_push($bookArr,$book);
                }
                print_r($bookArr);
                return $bookArr;
            }
        }
        else
        {
            echo "<h3>Invalid Rating</h3>";
            return 0;
        }
    }

    /**
     * returns  the books published by particular publisher
     * @param  string $publisher [publisher of book]
     * @return array         returns the detail of books published by perticular publisher on success, else 0 
     */
    function books_by_publisher($publisher)
    {
      $bookArr = array();
        $book ='';
        $query = "SELECT * FROM booksden_book WHERE publisher ='$publisher'";
        $res = $this->conn->query($query);
        if(!$res->num_rows)
        {
            echo"<h4> No Records Exists </h4>";
            return 0;
        }
        else
        {
            echo "<h3>Books Detail(by Publisher)</h3>";
            while($book = $res->fetch_assoc()) {
                array_push($bookArr,$book);
            }
            print_r($bookArr);
            return $bookArr;
        }
    }

    /**
     * returns the number of authors in the database
     * @return [integer] [no.of books in database]
     */
    function author_count()
    {   
        $res='';
        $count='';
        $query="SELECT COUNT(DISTINCT author) FROM booksden_book";
        $res=$this->conn->query($query);
        $count = $res->fetch_assoc()['COUNT(DISTINCT author)'];
        if (!$count) {
            echo "<h4>No Records Exist</h4>";
            return 0;
        }
        else {
            print_r("<h4>Total no Authors In Database: $count</h4>");
            return $count;
        }        
    }

    /**
     * Returns the array from string which contains multiple tags seperated by ';'
     * @param  {string} $tags string from tags column
     * @return {array}       array of tags
     */
    function parse_tags($tags)
    {
        $tags_array = explode(';', $tags);
        $tags_array = array_filter($tags_array);
        echo "<h3>Tags Array Are</h3>";
        print_r($tags_array);
        return $tags_array;
    }

    /*
    * updates tags to the database
    * @param {int} $isbn of record 
    * @return isbn on success else 0
    */
    function update_tags($isbn,$tags)
    {
        $update_data = "UPDATE booksden_book SET tags= '$tags' WHERE isbn=$isbn";

        if ($this->conn->query($update_data) === TRUE)   
        {
            echo "<h3>Tags updated successfully for book $isbn</h3>";
            return $isbn;
        } 
        else 
        {
            echo "Error updating tags: " . $this->conn->error;
            return 0;
        }
    }

	/**
	 * Other Functions Starts From Here
	 */
}
