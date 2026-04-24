<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE product_id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "UPDATE products 
            SET product_name='$product_name', quantity='$quantity', price='$price' 
            WHERE product_id=$id";

    if (mysqli_query($conn, $sql)) {
        // ✅ redirect with flag
        header("Location: view_products.php?updated=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<div class="card">

<h2>Update Product</h2>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>">

    <label>Product Name</label>
    <input type="text" name="product_name" value="<?php echo $row['product_name']; ?>" required>

    <label>Quantity</label>
    <input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required>

    <label>Price</label>
    <input type="number" step="0.01" name="price" value="<?php echo $row['price']; ?>" required>

    <input type="submit" name="update" value="Update Product">
</form>

<br>
<a href="view_products.php">← Back</a>

</div>
</div>

</body>
</html>
