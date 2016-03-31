<?php
	/* Entity classes */
	class customer 
	{
		private $info;
		private $payments;
		private $products;
		/* The constructor to create customer class
		 * Input: customerInfo, PaymentInfo
		 */
		public function __construct($info)
		{
			if (get_class($info) != "customerInfo")
			{
				trigger_error("[class/customer/constructor]Customer object is not created probally.", E_USER_ERROR);
				return null;
			}
			$this->info = $info;
			$this->payments = array();
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
				trigger_error("[class/customer/updatInfo]Cannot update customer info.", E_USER_ERROR);
				return 0;
			}
			$this->info = $customerInfo;
			return 1;
		}
		/* addPayment add a payment associated with the customer
		 * Input: paymentInfo
		 */
		public function addPayment($paymentInfo)
		{
			if (get_class($paymentInfo) != "paymentInfo")
			{
				trigger_error("[class/customer/addPayment]Cannot add new payment.", E_USER_ERROR);
				return 0;
			}
			$payment = new payment($paymentInfo);
			array_push($this->payments, $payment);
			return 1;
		}
		/* removePayment remove a payment associated with the customer
		 * Input: paymentInfo
		 */
		public function removePayment($paymentInfo)
		{
			if (get_class($paymentInfo) != "paymentInfo")
			{
				trigger_error("[class/customer/removePayment] Cannot remove payment.", E_USER_ERROR);
				return 0;
			}
			foreach ($this->payments as $key => $value)
				if ($value->getInfo() === $paymentInfo)
				{
					unset($this->payments[$key]);
					return 1;
				}
			return 0;
		}
		/* showPaymentList list all payments from the payment List
		 * Input: None
		 */
		public function showPaymentList()
		{
			return $this->payments;
		}
		/* addProduct add a product associated with the customer
		 * Input: productInfo
		 */
		public function addProduct($productInfo)
		{
			if (get_class($productInfo) != "productInfo")
			{
				trigger_error("[class/customer/addProduct]Cannot add new product.", E_USER_ERROR);
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
				trigger_error("[class/customer/removeProduct]Cannot remove product.", E_USER_ERROR);
				return 0;
			}
			foreach ($this->products as $key => $value)
				if ($value->getInfo() === $productInfo)
				{
					unset($this->products[$key]);
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
				trigger_error("[class/payment/constructor]Payment object is not created probally.", E_USER_ERROR);
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
				trigger_error("[class/payment/updatePayment]Cannot update payment info.", E_USER_ERROR);
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
				trigger_error("[class/product/constructor]Product object is not created probally.", E_USER_ERROR);
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
				trigger_error("[class/product/updateInfo]Cannot update product info.", E_USER_ERROR);
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
?>
