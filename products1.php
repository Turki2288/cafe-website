<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "store";

$conn = mysqli_connect($serverName, $username, $password, $dbname);

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المنتجات</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>المنتجات</h1>
        <nav>
            <ul>
                <li><a href="index.php">الرئيسية</a></li>
                <li><a href="products.php">المنتجات</a></li>
            </ul>
        </nav>
    </header>
    <section class="products">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="product">
                <img src="images/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                <h3><?= $row['name'] ?></h3>
                <p><?= $row['price'] ?> ريال</p>
                
            </div>
        <?php } ?>
    </section>
</body>
</html>
<?php mysqli_close($conn); ?>