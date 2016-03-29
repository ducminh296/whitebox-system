<?php
	/* Entities classes */
	class customer 
	{
		private $info;
		private $payment;
		private $products;
		/* The constructor to create customer class
		 * Input: customerInfo, PaymentInfo
		 */
		public function __construct($info, $paymentInfo)
		{
			if (get_class($info) != "customerInfo" || get_class($paymentInfo) != "paymentInfo" )
			{
				trigger_error("Customer object is not created probally.", E_USER_ERROR);
				return null;
			}
			$this->info = $info;
			$this->payment = new payment($paymentInfo);
			$this->products = array();
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
			{
				trigger_error("Cannot update customer info.", E_USER_ERROR);
				return 0;
			}
			$this->info = $customerInfo;
			return 1;
		}
		/* addProduct add a product associated with the customer
		 * Input: productInfo
		 */
		public function addProduct($productInfo)
		{
			if (get_class($productInfo) != "productInfo")
			{
				trigger_error("Cannot add new product.", E_USER_ERROR);
				return 0;
			}
			$product = new product($productInfo);
			array_push($this->products, $product);
			return 1;
		}
		/* removeProduct remove a prodyct associated with the customer
		 * Input: productInfo
		 */
		public function removeProduct($productInfo)
		{
			if (get_class($productInfo) != "productInfo")
			{
				trigger_error("Cannot remove product.", E_USER_ERROR);
				return 0;
			}
			foreach ($this->products as $value)
				if ($value->getInfo() === $productInfo)
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
			if (get_class($info) != "paymentInfo")
			{
				trigger_error("Payment object is not created probally.", E_USER_ERROR);
				return null;
			}
			$this->info = $info;
		}
		/* updatePayment updates the payment info of the customer
		 * Input: New payment info
		 */
		public function updatePayment($paymentInfo)
		{
			if (get_class($paymentInfo) != "paymentInfo")
			{
				trigger_error("Cannot update payment info.", E_USER_ERROR);
				return 0;
			}
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
			if (get_class($info) != "productInfo")
			{
				trigger_error("Product object is not created probally.", E_USER_ERROR);
				return null;
			}
			$this->info = $info;
		}
		/* updateInfo update the information of the product
		 * Input: new product info
		 */
		public function updateInfo($productInfo)
		{
			if (get_class($productInfo) != "productInfo")
			{
				trigger_error("Cannot update product info.", E_USER_ERROR);
				return 0;
			}
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
