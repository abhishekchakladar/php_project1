<?php 

    require('start.php');
    $ITEM_ID = $PRODUCT_NAME = $PRODUCT_PRICE = $PRODUCT_IMAGE = '';
	$ERROR = [];

	if(isset($_GET['id'])) {
		
		$ITEM_ID = $_GET['id'];

		$SQL_QUERY = mysqli_query($SQL_CON,"SELECT * FROM products WHERE id = $ITEM_ID");
		$FETCH_RESULT = MYSQLI_FETCH_ARRAY($SQL_QUERY);

		$PRODUCT_NAME = $FETCH_RESULT['name'];
		$PRODUCT_PRICE = $FETCH_RESULT['price'];
		$PRODUCT_IMAGE = $FETCH_RESULT['img'];	
	}

    if(isset($_POST['submit']))
    {    	
    	//get primary id of the product. //
		$ID = $_POST['id'];
		$_SESSION['id'] = $ID;
		$SQL_QUERY = MYSQLI_QUERY($SQL_CON, "SELECT * FROM products WHERE id = $ID");
		$FETCH_RESULT = MYSQLI_FETCH_ARRAY($SQL_QUERY);

		$PRODUCT_NAME = $FETCH_RESULT['name'];
		$PRODUCT_PRICE = $FETCH_RESULT['price'];
		$PRODUCT_IMAGE = $FETCH_RESULT['img'];
		
		$FIRST_NAME = $_POST['first_name'];
		$FIRST_NAME = FILTER_VAR(STR_REPLACE(' ', '', $FIRST_NAME),FILTER_SANITIZE_STRING);
		
		$LAST_NAME = $_POST['last_name'];
		$LAST_NAME = FILTER_VAR(STR_REPLACE(' ', '', $LAST_NAME),FILTER_SANITIZE_STRING);
		
		$ADDRESS = $_POST['address'];
		$ADDRESS =FILTER_VAR(STR_REPLACE(' ', '', $ADDRESS),FILTER_SANITIZE_STRING);
		
		$TOTAL_PRICE = $_POST['payment'];
		$TOTAL_PRICE = filter_var($TOTAL_PRICE, FILTER_SANITIZE_STRING);
	 	
		$_SESSION['FIRST_NAME'] = $FIRST_NAME;
		$_SESSION['LAST_NAME'] = $LAST_NAME;
		$_SESSION['ADDRESS'] = $ADDRESS;

	 	if(empty($FIRST_NAME)){
			$ERROR[] = "<br> You Must Enter First Name.";
		}
			
	 	
		 if(empty($LAST_NAME))
		 {
			$ERROR[] = "<br> You Must Enter Last Name.";
		 }
	 		
	
		 if(empty($ADDRESS))
		 {
			$ERROR[] = "<br> You Must Enter Address.";
		 }
	 		
		 
		//echo count($ERROR);

	 	if(count($ERROR) == 0)
	 	{
	 		$INSERT_QUERY = MYSQLI_QUERY($SQL_CON,"INSERT INTO customers VALUES ('','$FIRST_NAME','$LAST_NAME','$ADDRESS','$TOTAL_PRICE','$ID')");
	 		$SQL_QUERY = MYSQLI_QUERY($SQL_CON, "SELECT * FROM products WHERE id = $ID");
	 		$PRODUCT_DETAIL = MYSQLI_FETCH_ARRAY($SQL_QUERY);
	 		$ITEM_QUANTITY = $PRODUCT_DETAIL['quantity'];
	 		$MODIFIED_QUANTITY = $ITEM_QUANTITY - 1;
			$UPDATE_QUERY = MYSQLI_QUERY($SQL_CON,"UPDATE products SET quantity = '$MODIFIED_QUANTITY' WHERE id='$ID'");
			 
			$INSERT_QUERY_ORDER = MYSQLI_QUERY($SQL_CON,"INSERT INTO orders(firstname,lastname,product_id,total_price) 
										VALUES ('$FIRST_NAME','$LAST_NAME','$ID','$TOTAL_PRICE')");

	 		SESSION_DESTROY();
	 		header("Location: done.php");
		 }
		 else
		 {
			foreach($ERROR as $error){
				echo "$error";
		    }
		 }
	}
 ?>

