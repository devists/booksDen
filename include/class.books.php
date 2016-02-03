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

	/**
	 * Other Functions Starts From Here
	 */
}