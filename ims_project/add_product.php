<?php
include 'db_connect.php';

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (product_name, quantity, price) 
            VALUES ('$product_name', '$quantity', '$price')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Product added successfully!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<div class="card">

<h2>Add Product</h2>

<form method="post">
    <label>Product Name</label>
    <input type="text" name="product_name" required>

    <label>Quantity</label>
    <input type="number" name="quantity" required>

    <label>Price</label>
    <input type="number" step="0.01" name="price" required>

    <input type="submit" name="submit" value="Add Product">
</form>

<br>
<a href="view_products.php">← Back to Products</a>

</div>
</div>

</body>
</html>