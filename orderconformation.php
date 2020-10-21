<html>
<head>
  <title>Confirm Order</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php require('order.php');?>
 <div class="heading" style="width:100%"><h2 align="centre"><bold>Confirm Your Order</bold></h2></div>
 <div>
 	<div id="c1123">
 		<form class="form-horizontal" action='orderconformation.php' method='post'>

 			<div class="form-group">
			    <label class="control-label col-sm-3">Name:</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php echo $PRODUCT_NAME; ?>">
			    </div>
			 </div>
 			<div class="form-group">
			    <label class="control-label col-sm-3">Price:</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php  echo $PRODUCT_PRICE; ?>">
			    </div>
			 </div>

			 <div class="form-group">
			    <label class="control-label col-sm-3">First Name:</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php if(isset($_SESSION['FIRST_NAME'])) echo $_SESSION['FIRST_NAME']; ?>" name="first_name">
			    </div>
			 </div>	 
			 <div class="form-group">
			    <label class="control-label col-sm-3">Last Name:</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php if(isset($_SESSION['LAST_NAME'])) echo $_SESSION['LAST_NAME']; ?>" name="last_name">
			    </div>
			 </div>	 
			 <div class="form-group">
			    <label class="control-label col-sm-3">Address:</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" value="<?php if(isset($_SESSION['ADDRESS'])) echo $_SESSION['ADDRESS']; ?>" name="address">
			    </div>
			 </div>
 			
 			<div class="form-group">
 				<label class="control-label col-sm-3">Payment:</label>
 				 <div class="col-sm-7">
			      <select name="payment">
				    <option value="001">Debit Card</option>
					<option value="002">Credit Card</option>
					
				  </select>
				 </div> 
			</div>
			<input type="hidden" name="id" value="<?php if(isset($ITEM_ID)) echo $ITEM_ID; else echo $_SESSION['id']; ?>">
			<div class="form-group"> 
			    <div class="col-sm-offset-2 col-sm-7">
			      <button class="btn btn-primary" type="submit" class="btn btn-default" name="submit">Submit</button>
			    </div>
			</div>
 		</form>
 	</div>
 		
 	
 </div>
</body>
</html>