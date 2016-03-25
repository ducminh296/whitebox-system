<?php
	/* Entities classes */
	class customer 
	{
		private $info;
		private $payment;
		private $products;
		/* The constructor to create customer class
		 * Input: customerInfo, Payment, Array<Product> 
		 */
		public function __construct($info, $payment, $products)
		{
			$this->info = $info;
			$this->payment = $payment;
			$this->products = $products;
		}
		/* getInfo return the information of customer
		 * Input: none
		 */
		public function getInfo()
		{
			return $this->info;
		}
		/* updateInfo updates the customer's information
		 * Input: new customerInfo
		 */
		public function updateInfo($customerInfo)
		{
			if (get_class($customerInfo) != "customerInfo")
				return 0;
			$this->info = $customerInfo;
			return 1;
		}
		/* addProduct add a product associated with the customer
		 * Input: product
		 */
		public function addProduct($product)
		{
			if (get_class($product) != "product")
				return 0;
			array_push($this->products, $product);
			return 1;
		}
		/* removeProduct remove a prodyct associated with the customer
		 * Input: product
		 */
		public function removeProduct($product)
		{
			foreach ($this->products as $value)
				if ($value === $product)
				{
					unset($value);
					return 1;
				}
			return 0;
		}
		/* showProductList list all products from the product list
		 * Input: None
		 */
		public function showProductList()
		{
			return $this->products;
		}
	}
	class payment
	{
		private $info;
		/* The constructor to create payment class
		 * Input: none
		 */
		public function __construct($info)
		{
			$this->info = $info;
		}
		/* updatePayment updates the payment info of the customer
		 * Input: New payment info
		 */
		public function updatePayment($paymentInfo)
		{
			if (get_class($paymentInfo) != "paymentInfo")
				return 0;
			$this->info = $paymentInfo;
			return 1;
		}
		/* getInfo return the payment info of the customer
		 * Input: None:
		 * Output: payment info of the customer
		 */
		public function getInfo()
		{
			return $this->info;
		}
	}
	class product
	{
		private $info;
		/* The constructor to create product class
		 * Input: none
		 */
		public function __construct($info)
		{
			$this->info = $info;
		}
		/* updateInfo update the information of the product
		 * Input: new product info
		 */
		public function updateInfo($productInfo)
		{
			if (get_class($productInfo) != "productInfo")
				return 0;
			$this->info = $productInfo;
			return 1;
		}
		/* getInfo return the information of the product
		 * Input: None
		 * Output: product info of the product
		 */
		public function getInfo()
		{
			return $this->info;
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
