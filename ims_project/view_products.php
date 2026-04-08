<?php
include 'db_connect.php';

// Search functionality
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM products";
}

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

<!-- Search Box -->
<form method="GET" style="margin-bottom:15px;">
    <input type="text" name="search" placeholder="Search product (e.g. mugs)" 
           value="<?php echo $search; ?>" 
           style="width:70%; padding:10px;">
    <input type="submit" value="Search">
</form>

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

//added search function in view_products page
