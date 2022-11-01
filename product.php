<?php

$conn = new mysqli('localhost', 'root','xavier2012', 'a21dc585');
$conn->query("set names 'utf8'");
$conn->set_charset('utf_general_ci');
$sql = "select * from products ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0) {
    $page = isset($_GET['page']) ? $_GET['page'] : 0;//从零开始
    $imgnums = 10;    //每页显示的图片数
    $path = "uploads";   //图片保存的目录
    $handle = opendir($path);
    $i = 0;
    while (false !== ($file = readdir($handle))) {
        list($filesname, $ext) = explode(".", $file);
        if ($ext == "gif" or $ext == "jpg" or $ext == "JPG" or $ext == "GIF") {
            if (!is_dir('./' . $file)) {
                $array[] = $file;//保存图片名称
                ++$i;
            }
        }
    }

    if ($array) {
        rsort($array);//修改日期倒序排序
    }
    for ($j = $imgnums * $page; $j < ($imgnums * $page + $imgnums) && $j < $i; ++$j) {
        echo '<div>';
        echo $array[$j], '<br />';
        echo "<img src=" . $path . "/" . $array[$j] . "><br />";
        echo '</div>';
    }
    $realpage = @ceil($i / $imgnums) - 1;
    $Prepage = $page - 1;
    $Nextpage = $page + 1;
    if ($Prepage < 0) {
        echo "上一页 ";
        echo "<a href=?page=$Nextpage>下一页</a> ";
        echo "<a href=?page=$realpage>最末页</a> ";
    } elseif ($Nextpage >= $realpage) {
        echo "<a href=?page=0>首页</a> ";
        echo " <a href=?page=$Prepage>上一页</a> ";
        echo " 下一页";
    } else {
        echo "<a href=?page=0>首页</a> ";
        echo "<a href=?page=$Prepage>上一页</a> ";
        echo "<a href=?page=$Nextpage>下一页</a> ";
        echo "<a href=?page=$realpage>最末页</a> ";
    }
}








else{
    echo "0 结果";
}



mysqli_close();
?>