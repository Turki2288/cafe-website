<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "store";

$conn = mysqli_connect($serverName, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    if (isset($_POST['add'])) {
        $sql = "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM products WHERE id = $id";
        mysqli_query($conn, $sql);
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $sql = "UPDATE products SET name = '$name', price = '$price', image = '$image' WHERE id = $id";
        mysqli_query($conn, $sql);
    }
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المنتجات</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>إدارة المنتجات</h1>
        <nav>
            <ul>
                <li><a href="index.php">الرئيسية</a></li>
                <li><a href="products.php">المنتجات</a></li>
                <li><a href="manage.php">إدارة المنتجات</a></li>
            </ul>
        </nav>
    </header>
    <section class="manage">
        <form method="POST">
            <input type="text" name="name" placeholder="اسم المنتج" required>
            <input type="number" name="price" placeholder="السعر" required>
            <input type="text" name="image" placeholder="رابط الصورة" required>
            <button type="submit" name="add">إضافة المنتج</button>
        </form>
        <h2>المنتجات الحالية</h2>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <form method="POST">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="text" name="name" value="<?= $row['name'] ?>" required>
                <input type="number" name="price" value="<?= $row['price'] ?>" required>
                <input type="text" name="image" value="<?= $row['image'] ?>" required>
                <button type="submit" name="update">تحديث</button>
                <button type="submit" name="delete">حذف</button>
            </form>
        <?php } ?>
    </section>
</body>
</html>
<?php mysqli_close($conn); ?>