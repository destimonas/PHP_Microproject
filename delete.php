<?php
require_once __DIR__ . '/vendor/autoload.php';

$client = new MongoDB\Client('mongodb://localhost:27017');
$db = $client->homedecor;
$collection = $db->Items;


if (isset($_GET['id'])) {
    
        $productid = $_GET['id'];

        
        $deleteResult = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($productid)]);

        if ($deleteResult->getDeletedCount() > 0) {
            echo '<script>alert("Product deleted successfully!");</script>';
        } else {
            echo '<script>alert("Product not found.");</script>';
        }
    
}


header('Location: view.php');
exit;
?>
