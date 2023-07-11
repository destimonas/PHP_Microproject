<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client('mongodb://localhost:27017');
$db = $client->homedecor;
$collection = $db->Items;


if (isset($_POST['is_submit'])) {
    
        $productid = $_GET['id'];

        
        $updateResult = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectID($productid)],
            ['$set' => [
                'productid' => $_POST['productid'],
                'productname' => $_POST['productname'],
                'type' => $_POST['type'],
                'color' => $_POST['color'],
                'price' => $_POST['price']
            ]]
        );

        if ($updateResult->getModifiedCount() > 0) {
            echo '<script>alert("product updated successfully!");</script>';
        } else {
            echo '<script>alert("No changes made to product.");</script>';
        }
    
}

$productid = $_GET['id'];
$Items = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($productid)]);
?>

<html>
<head>
<title>Update Product</title>
<style>
body {
  background-image: url("image2.jpg");
}
</style>
</head>

<body>
<center>
<div id="main" style=" margin-top:150px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; width:300px;padding-left:5px;padding-right:5px;padding-bottom:5px;border-radius:3px" >
<h2 style="color:black;">Update Product</h2>
<form method="post">

    <table>
        <tr>
            <td>productid</td>
            <td><input type="text" name="productid" value="<?php echo $Items['productid']; ?>"></td>
        </tr>
        <tr>
            <td>productname</td>
            <td><input type="text" name="productname" value="<?php echo $Items['productname']; ?>"></td>
        </tr>
        <tr>
            <td>type</td>
            <td><input type="text" name="type" value="<?php echo $Items['type']; ?>"></td>
        </tr>
        <tr>
            <td>color</td>
            <td><input type="text" name="color" value="<?php echo $Items['color']; ?>"></td>
        </tr>
        <tr>
            <td>price</td>
            <td><input type="text" name="price" value="<?php echo $Items['price']; ?>"></td>
        </tr>
        <tr>
            <td></td>
           <td><input type="submit" value="Update" name="is_submit"></td>
        </tr>
    </table>
</form>
<button><a href="view.php">Back</a></button>
</center>
</body>
</html>
