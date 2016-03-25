<?php
	/* Contain test cases to test back-end codes */
	/* TEST SUITES */
	test_product_class();
	test_payment_class();
	test_customer_class();
	test_database_class();
	/* Mock-Up infos */
	$productInfo = (productInfo)[
				'productID' => 1,
				'buildID' => 2,
				'componentType' => "Motherboard",
				'manufacturer' => "ASUS",
				'description' => "Socket 1151 Intel Z170 Chipset",
				'modelNumber' => "Z170-A",
				'serialNumber' => "AS1234",
				'rebateValue' => "50",
				'price' => "235",
				'warrantyPeriod' => "2 years",
				'warrantyExpiry' => "March 24 2018",
				'invoiceDate' => "March 24 2016",
				'invoiceNumber' => "IVWB0001",
				'salesOrderNumber' => "SWB0001",
				'itemSKU' => "0001"
				];
	$info = (customerInfo)[
				'buildID' => 1,
				'address' => "1 ABC Drive",
				'name' => "John Smith",
				'email' => "john.smith@gmail.com",
				'phone' => "6130001111",
				'deliveryDate' => 'March 20 2016'
				];
	$paymentInfo = (paymentInfo)[
				'buildID' => 1,
				'confirmation' => "Confirmed",
				'paymentMethod' => "Visa",
				'totalValue' => "100"
				];
	/* Help variable */
	$suiteCount = 0;
	$numPass = 0;
	$numFail = 0;
	/* Help functions */
	function echo_PASS()
	{
		echo "<font color='green'>PASS</font>";
		$numPass++;
	}
	function echo_FAIL()
	{
		echo "<font color='red'>FAIL</font>";
		$numFail++;
	}
	/* Test suites starts */
	function test_product_class() 
	{
		/* Start test suite */
		echo "Test suite $suiteCount++: __FUNCTION__";
    	$caseCount = 0;
    	/* Test cases start */
		/* Test case 1
		 * Test: Creating a new product object
		 */
		echo "Test case $suiteCount.$caseCount++: Create new product object.";
		$product = new product($productInfo);
		if (get_class($product) == "product")
			echo_PASS();
		else
			echo_FAIL();
	}
	function test_payment_class()
	{

	}
	function test_customer_class()
	{
		/* Start test suite */
		echo "Test suite $suiteCount++: __FUNCTION__";
    	$caseCount = 0;
    	/* Test cases start */
		/* Test case 1 
		 * Test: Creating a new customer object
		 */
		echo "Test case $suiteCount.$caseCount++: Create new customer object.";
		$customer = New customer($info, $paymentInfo, $productInfo);
		if (get_class($customer) != "customer")
			echo_PASS();
		else
			echo_FAIL();
	}
	function test_database_class()
	{

	}

?>