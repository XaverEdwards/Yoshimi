<?php

$conn = new mysqli('localhost', 'root','xavier2012', 'a21dc585');
$conn->query("set names 'utf8'");
$conn->set_charset('utf_general_ci');
$sql = "select * from products";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0) {


    while ($row = mysqli_fetch_assoc($result)) {

        echo "id: " . $row["id"] . " - Name: " . $row["productName"]."\t"."JPY¥:" .$row['price']."<br />";


    }
}
else{
    echo "0 结果"."<br/>";
}

$deleteID = $_POST['id'];

if(!empty($_POST)){

    $find = mysqli_query($conn, "SELECT * from products where id = '$deleteID'") or die("Failed to query database ".mysqli_error());
    if (mysqli_num_rows($find)>0){
        $findList = mysqli_fetch_assoc($find);
        $status=unlink($findList["location"]);
        if($status){
            echo "File deleted successfully";
        }else{
            echo "Sorry!";
        }

    }
    $delete = mysqli_query($conn,"delete from products where id = '$deleteID'") or die("Failed to query database ".mysqli_error());
    $conn->query($delete);
    echo "消除成功！";

    header("refresh: 1");

}





/*header("refresh: 2");
echo date('H:i:s Y-m-d');
exit;*/


?>
<!DOCTYPE html>
<html>
<body>
<h1>商品編集</h1>

<form action="ProductsDelete.php" method="POST">
    <p>
        <label>消除したいID:</label>
        <input type="text" name="id"/>
    </p>

    <p>
        <input type="submit" value="消除する" />
    </p>


</form>
</body>
</html>