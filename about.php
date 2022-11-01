<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$price = $_POST['price'];



$con=mysqli_connect("localhost","root","xavier2012");
mysqli_select_db($con,"a21dc585");
$con->set_charset('utf_general_ci');



if(!empty($_FILES)){
    $tmpname   = $_FILES['upfile']['tmp_name'];     // 临时文件名称
    $name      = $_FILES['upfile']['name'];         // 文件的原名称
    $path      = './uploads';                       // 上传目录
    $file_name = $subject."."."jpg";// 避免文件重名，更改文件名称
    $file_name = date('YmdHis').rand(100,999).$file_name;
    if(move_uploaded_file($tmpname, $path.'/'.$file_name)){
        echo $file_name." 上传成功！";
        $sql = "insert into products (productName, location, price, name) values ('$file_name', '$path/$file_name', '$price', '$subject')";
        if ($con->query($sql) === TRUE) {
            echo "新しい商品メッセージ更新完了";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }else{
        echo $file_name." 上传失败！";
    }
}
echo "<img src=".$path.'/'.$file_name."><br />";
echo "</br>";
mysqli_close($con);




?>