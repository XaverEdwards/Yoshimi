<?php
// 获取提交的用户名+密码
$input_username = $_POST["username"];
$input_password = $_POST["password"];

// 查询用户是否存在
$sql_server = "localhost";
$sql_username = "root";
$sql_password = "xavier2012";
$sql_database = "a21dc585";
$con = new mysqli($sql_server, $sql_username, $sql_password, $sql_database);
$sql = 'SELECT * FROM user WHERE username="' . $input_username . '"';

$res = $con->query($sql);

// 用户不存在 正常注册
if($res==null || $res->num_rows==0) {
    $sql = 'INSERT INTO user (`username`, `password`) VALUES ("' . $input_username . '","' . $input_password . '")';
    $con->query($sql);	// 数据库插入
    echo "註冊成功";
}
// 用户存在 查询出错
else if($res->num_rows>=1) {
    echo "用戶已經存在";
}
?>
