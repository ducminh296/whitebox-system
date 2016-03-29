<?php
	/* Boundary classes */
	class database
	{
		private $sqlHandler;
		/* The constructor to create a database class
		 * Input: none
		 */
		public function __construct()
		{
			$this->sqlHandler = new mysqli(SQL_SERVER, SQL_USERNAME, SQL_PASSWORD, SQL_DATABASE);
			//check connection
			if ($this->sqlHandler->connect_error)
			{
				trigger_error("[class/database/constructor]Connection to SQL server failed:". $sqlHandler->connect_error, E_USER_ERROR);
				return null;
			}
		}
		/* createNewCustomer add a new customer into the database
		 * Input: None
		 * Output: BuildID associated with the customer 
		 */
		public function createNewCustomer()
		{
			/* Query adding a new customer entry into customers table */
			$query = 'INSERT INTO customers (name) VALUES ("new customer");';
			$result=$this->sqlHandler->query($query);
			if (!$result) return 0;
			/* Query fetch the buildID of the new customer entry */
			$query = 'SELECT LAST_INSERT_ID();';
			$result=$this->sqlHandler->query($query);
			$row=$result->fetch_assoc();
			$buildID = (int)$row["LAST_INSERT_ID()"];
			return $buildID;
		}
		/* updateCustomerInfo update the info of existing customer
		 * Input: CustomerInfo
		 * Output: boolean
		 */
		public function updateCustomerInfo($customerInfo)
		{
			$query = 'UPDATE customers SET '.
					 	'name ="'.$customerInfo->name.'", '.
					 	'address="'.$customerInfo->address.'", '.
					 	'email="'.$customerInfo->email.'", '.
					 	'phone="'.$customerInfo->phone.'", '.
					 	'deliveryDate="'.$customerInfo->deliveryDate.'" '.
					 	'WHERE buildID ='.$customerInfo->buildID.';';
			$result=$this->sqlHandler->query($query);
			if (!$result) return 0;
			return 1;
		}

		/* The destructor for database class */
		public function __destruct()
		{
			$this->sqlHandler->close();
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