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
    function update_edition($isbn)
    {
        $update_data = "UPDATE booksden_book SET edition='8' WHERE isbn=$isbn";

        if ($this->conn->query($update_data) === TRUE)   
        {
            echo "<h3>Record updated successfully</h3>";
            return $isbn;
        } 
        else 
        {
            echo "Error updating record: " . $this->conn->error;
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
    */
    function books_sortby_up_date()
    {
        #$books_update=array();
        #$up_date="SELECT up_date FROM booksden_book WHERE 1";
    }
    /*
    * sort database table according to publication year
    */
    function books_sortby_p_year()
    {
        
    }
    /*
    * sort database table according to title
    */
    function books_sortby_title()
    {
        
    }
    /**
     * returns books by particular author 
     * @param  string $authorName [Name of the author]
     * @return [array]             [on success,returns titles of the book by that author, else 0]
     */
    function books_by_author($authorName)
    {
    	#$res = '';
    	$bookArr = array();
    	$book = '';
    	$query = "SELECT title FROM booksden_book WHERE author = '$authorName'";
    	$res = $this->conn->query($query);
    	if($res == FALSE){
    		echo"<h4> No Records Exist </h4>";
    		echo $res;
    		return 0;
    	}
    	else{
    		echo "<h3>Books Name</h3>";

    		while($book = $res->fetch_assoc()){
    			array_push($bookArr,$book['title']);
    		}
    		print_r($bookArr);
    		return $bookArr;
    	}

    }
/**
 * returns the books of a particular category
 * @param  [string] $categoryName [Name of the category]
 * @return [Array]               [returns title of the books of a particular category on success, else 0]
 */
    function books_by_category($categoryName)
    {
    	#$res = '';
    	$bookArr = array();
    	$book = '';
    	$query = "SELECT title FROM booksden_book WHERE category = '$categoryName'";
    	$res = $this->conn->query($query);
    	if($res == FALSE){
    		echo"<h4> No Records Exist </h4>";
    		echo $res;
    		return 0;
    	}
    	else{
    		echo "<h3>Books Name</h3>";

    		while($book = $res->fetch_assoc()){
    			array_push($bookArr,$book['title']);
    		}
    		print_r($bookArr);
    		return $bookArr;
    	}

    }
    /**
     * returns the title of the books published in a particular year
     * @param  string $p_year timestamp of p_year
     * @return array         returns the books published in a particular year on success, else 0 
     */
    function books_by_p_year($p_year)
    {
    	#$res = '';
    	$bookArr = array();
    	$book = '';
    	$query = "SELECT title FROM booksden_book WHERE p_year = '$p_year'";
    	$res = $this->conn->query($query);
    	if($res == FALSE){
    		echo"<h4> No Records Exist </h4>";
    		echo $res;
    		return 0;
    	}
    	else{
    		echo "<h3>Books Name</h3>";

    		while($book = $res->fetch_assoc()){
    			array_push($bookArr,$book['title']);
    		}
    		print_r($bookArr);
    		return $bookArr;
    	}

    }

	/**
	 * Other Functions Starts From Here
	 */
}