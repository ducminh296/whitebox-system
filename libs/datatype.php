<?php
	/* User-defined data-types*/
	class customerInfo
	{
		public $buildID;
		public $address;
		public $name;
		public $email;
		public $phone;
		public $deliveryDate;
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