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
    function add_insert()
    {
        $data="INSERT INTO booksden_book(isbn,up_date,title,author,publisher,p_year,edition,lang,category,tags,pages,rating,comment,count) VALUES(278929, '2016-02-06 18:07:57', 'C How to Program', 'Paul Dietel & Harvey', '\0', '2016-02-06 18:07:57', 7, 'English', 'Programming', 'Basic C Programming', 0, '', '', 0)";
        if($this->conn->query($data) == true)
        {
            echo "new record create successfuly";
        }
        else
        {
            echo "error in insertion" . $this->conn->error;
        }
    }
    function update_record()
    {
        $update_data = "UPDATE booksden SET edition='8' WHERE id=2";

        if ($this->conn->query($update_data) === TRUE)   
        {
            echo "Record updated successfully";
        } 
        else 
        {
        echo "Error updating record: " . $this->conn->error;
        }
    }
    function delete_record()
    {
        $delete = "DELETE FROM booksden WHERE id=2";

        if ($this->conn->query($delete) === TRUE)
        {
        echo "Record deleted successfully";
        }       
        else 
        {
        echo "Error deleting record: " . $this->conn->error;
        }
    }

	/**
	 * Other Functions Starts From Here
	 */
}