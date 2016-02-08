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
    function authorList()
    {
        $res='';
        $authorArr=array();
        $query="SELECT author FROM booksden_book WHERE 1";
        $res=$this->conn->query($query);
        if (!$res->num_rows) {
            echo "<h4>No Records Exist</h4>";
            return 0;
        }
        else {
            echo "Author Name\n";

            while ($author= $res->fetch_assoc()) {
                array_push($authorArr, $author['author']);
            }
            print_r($authorArr);
            return $authorArr;
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



	/**
	 * Other Functions Starts From Here
	 */
}