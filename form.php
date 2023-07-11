  
  <html>
  <head>
   <link rel="stylesheet" href="style.css">
  <title>SignIn</title>
  <style>
	body {
  background-image: url("image.jpg");
}
	</style>
  </head>

	<body class="form-body">
	<?php
require_once __DIR__ . '/vendor/autoload.php';



$client = new MongoDB\Client('mongodb://localhost:27017');
$db = $client -> homedecor;
//$collection=$db->createCollection("Items");
$collection=$db->Items;

if (isset($_POST['is_submit'])) {
    try {
        $insertOneResult = $collection->insertOne([
            'productid' => $_POST['productid'],
            'productname' => $_POST['productname'],
            'type' => $_POST['type'],
			'color' => $_POST['color'],
            'price' => $_POST['price']
            
        ]);

        if ($insertOneResult->getInsertedCount() > 0) {
            echo '<script>alert("Inserted Successfully!");</script>';

        }
		
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>


<center>
	<form method="post" action="#" class="form-form">
		<div id="main" style="  margin-top:150px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width:300px;padding-left:5px;padding-right:5px;padding-bottom:5px;border-radius:3px" >
			<div class="h-tag">
				<center><h2 style="margin-top:150px;color:black;padding-top:10px"> Product Details</h2></center>
				
			</div>
			
			<div class="login">
				<table cellspacing="2" align="center" cellpadding="8" border="0">
					<tr>
						<td align="right">productid </td>
						<td><input type="text" placeholder=" " class="tb" name="productid"/></td>
					</tr>
					<tr>
						<td align="right">productname </td>
						<td><input type="text" placeholder=" " class="tb" name="productname"/></td>
					</tr>
					<tr>
	<td align="right">type</td>
	<td><input type="text" placeholder=" " class="tb" name="type"/></td>
	</tr>
	<tr>
		<td align="right">color</td>
		<td><input type="text" placeholder=" " class="tb" name="color"/></td>
	</tr>
	<tr>
		<td align="right">price</td>
		<td><input type="text" placeholder=" " class="tb" name="price"/></td>
	</tr>
	<tr>
		<td></td>
		<td>
			
			<input type="submit" value="Submit" class="btn" name="is_submit" /></td>
		</tr>
	</table>
</div>
<center>

<button><a href="view.php" style="text-decoration: none; color:black">Items</a></button>
</center>


</div>

</form>
</center>
</body>
</html>


