<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client('mongodb://localhost:27017');
$db = $client->homedecor;
$collection = $db->Items;
?>


<?php
$Itemss = $collection->find();
?>

<html>
<head>
<title>View Products</title>
<link rel="stylesheet" href="view.css">
<style>
    table {
        border: 1px solid black;
        border-collapse: collapse;
        margin: auto;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #ffff;
    }
    td{
        background-color: #ffff;
    }
	body {
  background-image: url("image1.jpg");
}

</style>
</head>
<body>
<div style="overflow-x:auto;">
<div style="text-align: center;margin-top:80px;">
    <h2 style="color:black">Product Details</h2>
    <table>
        <tr>
            <th>productid</th>
            <th>productname</th>
            <th>type</th>
            <th>color</th>
            <th>price</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($Itemss as $Items) : ?>
            <tr>
                <td><?php echo $Items['productid']; ?></td>
                <td><?php echo $Items['productname']; ?></td>
                <td><?php echo $Items['type']; ?></td>
                <td><?php echo $Items['color']; ?></td>
                <td><?php echo $Items['price']; ?></td>
                <td><a href="update.php?id=<?php echo $Items['_id']; ?>" style="text-decoration: none; color:black">Update</a></td>
                <td><a href="delete.php?id=<?php echo $Items['_id']; ?>" style="text-decoration: none; color:black">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</div>
</body>
</html>
