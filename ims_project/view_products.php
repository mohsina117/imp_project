<?php
include 'db_connect.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<div class="card">

<h2>Product List</h2>

<a href="add_product.php" class="top-btn">+ Add Product</a>

<table>
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Actions</th>
</tr>
</thead>
<tbody>
<?php
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>".$row['product_id']."</td>
                <td>".$row['product_name']."</td>
                <td>".$row['quantity']."</td>
                <td>".$row['price']."</td>
                <td>
                    <a href='update_product.php?id=".$row['product_id']."' class='action-btn edit'>Edit</a>
                    <a href='delete_product.php?id=".$row['product_id']."' onclick='return confirm(\"Are you sure?\")' class='action-btn delete'>Delete</a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No products found</td></tr>";
}
?>
</tbody>
</table>

</div>
</div>

</body>
</html>