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
					 	'WHERE buildID ='.(int)$customerInfo->buildID.';';
			$result=$this->sqlHandler->query($query);
			return $result;
		}
		/* deleteCustomer delete a customer from the database
		 * Input: Customer's BuildID
		 * Output: boolean
		 */
		public function deleteCustomer($buildID)
		{
			$query = 'DELETE FROM customers WHERE buildID ='.(int)$buildID.';';
			$result = $this->sqlHandler->query($query);
			return $result;
		}
		/* retrieveCustomer retrieve a customer's info given the buildID
		 * Input: buildID
		 * Output: customerInfo
		 */
		public function retrieveCustomer($buildID)
		{
			$query = 'SELECT * FROM customers WHERE buildID ='.(int)$buildID.';';
			$result = $this->sqlHandler->query($query);
			if (!$result) return 0;
			$row = $result->fetch_assoc();
			$customerInfo = new CustomerInfo();
			foreach ($row as $key => $value)
			{
				$customerInfo->{$key} = $value;
			}
			return $customerInfo;
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