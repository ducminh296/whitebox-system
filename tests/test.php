<?php
	include '../libs/datatype.php';
	include '../libs/model.php';
	include '../libs/boundary.php';
	include '../libs/control.php';
	include '../libs/system.php';
	/* Contain test cases to test back-end codes */
	/* TEST SUITES */
	init_test();
	test_product_class();
	test_payment_class();
	test_customer_class();
	test_database_class();
	test_folder_class();
	test_control_class();
?>
<?php
	/* Init Tests */
	/* Test function create some mock-up data to create the test enviroment */
	function init_test()
	{
		global $suiteCount;
		global $productInfo;
		global $paymentInfo;
		global $customerInfo;
		/* Help variable */
		$suiteCount = 1;
		/* Mock-Up infos */
		/* product info */
		$productInfo = new productInfo();
		$productInfo->productID = 1;
		$productInfo->buildID = 2;
		$productInfo->componentType = "Motherboard";
		$productInfo->manufacturer = "ASUS";
		$productInfo->description = "Socket 1151 Intel Z170 Chipset";
		$productInfo->modelNumber = "Z170-A";
		$productInfo->serialNumber = "AS1234";
		$productInfo->rebateValue = "50";
		$productInfo->price = "235";
		$productInfo->warrantyPeriod = 24;
		$productInfo->warrantyExpiry = "March 24 2018";
		$productInfo->invoiceDate = "March 24 2016";
		$productInfo->invoiceNumber = "IVWB0001";
		$productInfo->salesOrderNumber = "SWB0001";
		$productInfo->itemSKU = 3;
		/* customer info */
		$customerInfo = new customerInfo();
		$customerInfo->buildID = 1;
		$customerInfo->address = "1 ABC Drive";
		$customerInfo->name = "John Smith";
		$customerInfo->email = "john.smith@gmail.com";
		$customerInfo->phone = "6130001111";
		$customerInfo->deliveryDate = '2016-03-29';
		/* Payment info */
		$paymentInfo = new paymentInfo();
		$paymentInfo->buildID = 1;
		$paymentInfo->confirmation = "Confirmed";
		$paymentInfo->paymentMethod = "Visa";
		$paymentInfo->totalValue = 100;
	}
	/* Test suites starts */
	function test_product_class() 
	{
		global $suiteCount;
		global $productInfo;
		/* Start test suite */
		start_SUITE($suiteCount, "Test product class");
    	$caseCount = 1;
    	$numPass = 0;
		$numFail = 0;
    	/* Test cases start */
		/* Test case 1
		 * Test: Creating a new product object
		 */
		start_Case($caseCount, "Creating a new product object");
		$product = new product($productInfo);
		if (get_class($product) == "product" && $product != null)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_Case();
		$caseCount++;
		/* Test case 2
		 * Test: Check if product info is correct
		 */
		start_Case($caseCount, "Check if product info is correct");
		if ($product->getInfo() === $productInfo)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_Case();
		$caseCount++;
		/* Test case 3
		 * Test: Updating product info
		 */
		start_Case($caseCount, "Updating product info");
		$productInfo->buildID = 2;
		$product->updateInfo($productInfo);
		if ($product->getInfo() === $productInfo)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_Case();
		$caseCount++;
		/* End test suite */
		end_SUITE($numPass,$numFail);
		$suiteCount++;
	}
	function test_payment_class()
	{

		global $suiteCount;
		global $paymentInfo;
		/* Start test suite */
		start_SUITE($suiteCount, "Test payment class");
    	$caseCount = 1;
    	$numPass = 0;
		$numFail = 0;
    	/* Test cases start */
		/* Test case 1
		 * Test: Creating a new payment object
		 */
		start_Case($caseCount, "Creating a new payment object");
		$payment = new payment($paymentInfo);
		if (get_class($payment) == "payment" && $payment != null)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_Case();
		$caseCount++;
		/* Test case 2
		 * Test: Check if payment info is correct
		 */
		start_Case($caseCount, "Check if payment info is correct");
		if ($payment->getInfo() === $paymentInfo)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_Case();
		$caseCount++;
		/* Test case 3
		 * Test: Updaing payment info
		 */
		start_Case($caseCount, "Updating payment info");
		$paymentInfo->paymentMethod = "Master Card";
		$payment->updatePayment($paymentInfo);
		if ($payment->getInfo() === $paymentInfo)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_Case();
		$caseCount++;
		/* End test suite */
		end_SUITE($numPass,$numFail);
		$suiteCount++;
	}
	function test_customer_class()
	{
		global $suiteCount;
		global $productInfo;
		global $paymentInfo;
		global $customerInfo;
		/* Start test suite */
		start_SUITE($suiteCount, "Test customer class");
    	$caseCount = 1;
    	$numPass = 0;
		$numFail = 0;
    	/* Test cases start */
		/* Test case 1
		 * Test: Creating a new customer object
		 */
		start_Case($caseCount, "Creating a new customer object");
		$customer = New customer($customerInfo);
		if (get_class($customer) == "customer" && $customer != null)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 2
		 * Test: Check if customer info is correct
		 */
		start_Case($caseCount, "Check if customer info is correct");
		if ($customer->getInfo() === $customerInfo)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 3
		 * Test: Updating customer info
		 */
		start_Case($caseCount, "Updating customer info");
		$customerInfo->phone = "6130002222";
		$customer->updateInfo($customerInfo);
		if ($customer->getInfo() === $customerInfo)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 4
		 * Test: Adding new payment
		 */
		start_Case($caseCount, "Adding new payment");
		if ($customer->addPayment($paymentInfo))
		{
			//var_dump($customer->showPaymentList());
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 5
		 * Test: Removing a payment
		 */
		start_Case($caseCount, "Removing a payment");
		if ($customer->removePayment($paymentInfo))
		{
			//var_dump($customer->showPaymentList());
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 6
		 * Test: Testing show payment list
		 */
		start_Case($caseCount, "Testing show payment list");
		if (is_array($customer->showPaymentList()))
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 7
		 * Test: Adding new product
		 */
		start_Case($caseCount, "Adding new product");
		if ($customer->addProduct($productInfo))
		{
			//var_dump($customer->showProductList());
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 8
		 * Test: Removing a product
		 */
		start_Case($caseCount, "Removing a product");
		if ($customer->removeProduct($productInfo))
		{
			//var_dump($customer->showProductList());
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 9
		 * Test: Testing show product list
		 */
		start_Case($caseCount, "Testing show product list");
		if (is_array($customer->showProductList()))
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* End test suite */
		end_SUITE($numPass,$numFail);
		$suiteCount++;
	}
	function test_database_class()
	{
		global $suiteCount;
		global $productInfo;
		global $paymentInfo;
		global $customerInfo;
		/* Start test suite */
		start_SUITE($suiteCount, "Test database class");
    	$caseCount = 1;
    	$numPass = 0;
		$numFail = 0;
    	/* Test cases start */
		/* Test case 1
		 * Test: Creating a new database class 
		 */
		start_Case($caseCount, "Creating a new database object");
		$database = New database();
		if (get_class($database) == "database" && $database != null)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 2
		 * Test: Adding new customer into database
		 */
		start_Case($caseCount, "Adding new customer into database");
		$buildID = $database->createNewCustomer();
		$customerInfo->buildID = $buildID;
		if ($buildID)
		{
			echo "BuildID = $buildID  - ";
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 3
		 * Test: Updating customer info
		 */
		start_Case($caseCount, "Updating customer info");
		if ($database->updateCustomerInfo($customerInfo))
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 4
		 * Test: retrieving customer info
		 */
		start_Case($caseCount, "Retrieving a customer's info");
		$customerInfo_tc = $database->retrieveCustomer($customerInfo->buildID);
		if ($customerInfo_tc == $customerInfo)
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 5
		 * Test: Retrieving the payment list
		 */
		start_Case($caseCount, "Retrieving the payment list");
		if ($database->retrievePaymentList($customerInfo->buildID))
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* Test case 
		 * Test: Deleting a customer
		 */
		start_Case($caseCount, "Deleting a customer");
		if ($database->deleteCustomer($customerInfo->buildID))
		{
			echo_PASS();
			$numPass++;
		}
		else
		{
			echo_FAIL();
			$numFail++;
		}
		end_case();
		$caseCount++;
		/* End test suite */
		end_SUITE($numPass,$numFail);
		$suiteCount++;
	}
	function test_control_class()
	{

	}
	function test_folder_class()
	{
		
	}
?>
<?php
	/* Help functions */
	function start_SUITE($suiteCount, $suiteName)
	{
		echo "-----------------";
		echo "<b> SUITE ".$suiteCount++.' - '. $suiteName." </b>";
		echo "-----------------";
		echo "<br>";
	}
	function end_SUITE($numPass, $numFail)
	{
		echo "----------------- ";
		echo "<b>END SUITE: </b>";
		echo_PASS();
		echo ": ".$numPass;
		echo " - ";
		echo_FAIL();
		echo ": ";
		echo " ".$numFail." ";
		echo "-----------------";
		echo "<br><br><br>";
	}
	function start_Case($caseCount, $caseName)
	{
		echo "<b>Case $caseCount</b> - $caseName - ";
	}
	function end_Case()
	{
		echo "<br>";
	}
	function echo_PASS()
	{
		echo "<b><font color='green'>PASS</font></b>";
	}
	function echo_FAIL()
	{
		echo "<b><font color='red'>FAIL</font></b>";
	}
?>