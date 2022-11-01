<?php

header("content-Type: text/html; charset=utf-8");//字符编码设置
$servername = "localhost";
$username = "root";
$password = "xavier2012";
$dbname = "a21dc585";

// 创建连接
$conn =new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$sql = "SELECT * FROM products";
$result = $conn->query($sql) or die("Error in Selecting" .mysqli_error($conn));
$array = array();
while($row = mysqli_fetch_assoc($result)){
    $array[] = $row;
}
$data = json_encode($array, JSON_PRETTY_PRINT);
$data = stripcslashes($data);
echo $data;

file_put_contents('/var/www/html/json/products.json', $data);


$conn->close();



?>