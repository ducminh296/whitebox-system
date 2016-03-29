<?php
	/* Boundary classes */
	class database
	{
		private $sqlHandler;
		/* The constructor to create database class
		 * Input: none
		 */
		public function __construct()
		{
			$this->sqlHandler = new mysqli(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD, SQL_DATABASE);
			//check connection
			if ($sqlHandler->connect_error)
			{
				trigger_error("[class/database/constructor]Connection to SQL server failed:". $sqlHandler->connect_error, E_USER_ERROR);
				return null;
			}
		}
		/* The destructor for database class */
		public function __destruct()
		{
			$sqlHandler->close();
		}
	}
	class folder
	{
		/* The constructor to create folder class
		 * Input: none
		 */
		public function __construct()
		{

		}
	}
?>