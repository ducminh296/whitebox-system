<?php
	/* Entities classes */
	class customer 
	{
		/* The constructor to create customer class
		 * Input: none
		 */
		public function __construct()
		{
			
		}
	}
	class payment
	{
		/* The constructor to create payment class
		 * Input: none
		 */
		public function __construct()
		{

		}
	}
	class product
	{
		/* The constructor to create product class
		 * Input: none
		 */
		public function __construct()
		{

		}
	}
	/* Datatype classses */
	class customerInfo
	{
		public $buildID;
		public $address;
		public $name;
		public $email;
		public $phone;
		public $deliveryData;
	} 
	class paymentInfo
	{
		public $buildID;
		public $confirmation;
		public $paymentMethod;
		public $totalValue;
	}
	class productInfo
	{
		public $productID;
		public $buildID;
		public $componentType;
		public $manufacturer;
		public $description;
		public $modelNumber;
		public $serialNumber;
		public $rebateValue;
		public $price;
		public $warrantyPeriod;
		public $warrantyExpiry;
		public $invoiceDate;
		public $invoiceNumber;
		public $salesOrderNumber;
		public $itemSKU;
	}
?>
