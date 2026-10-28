<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "store";

$conn = mysqli_connect($serverName, $username, $password);

if (!$conn) {
    die("فشل الاتصال: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($conn, $sql)) {
    echo "تم إنشاء قاعدة البيانات بنجاح";
} else {
    echo "حدث خطأ أثناء إنشاء قاعدة البيانات: " . mysqli_error($conn);
}

mysqli_select_db($conn, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "تم إنشاء الجدول بنجاح";
} else {
    echo "حدث خطأ أثناء إنشاء الجدول: " . mysqli_error($conn);
}

mysqli_close($conn);
?>