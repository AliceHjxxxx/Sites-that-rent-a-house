<?php
//声明变量并接受form表单发送过来的数据
error_reporting(E_ALL ^ E_DEPRECATED);
$year = $_POST[ "year" ];
$month = $_POST[ "month" ];
$day = $_POST[ "day" ];
$id = $_POST[ "id" ];
$location = $_POST[ "location" ];
$coveredArea = $_POST[ "coveredArea" ];
$insideArea = $_POST[ "insideArea" ];
$price= $_POST[ "price" ];
$housetype = $_POST[ "housetype" ];
$owner= $_POST[ "owner" ];
$time = $year . "-" . $month . "-" . $day;
//字符串拼接，打印输出

//连接数据库
$con = mysql_connect("localhost","root","");
if($con){
echo "<br/>连接数据库成功"."<br/>";
} else{
echo "<br/>连接数据库失败".mysql_error();
}
//选择数据库
$c=mysql_select_db("eirs");
if($c){
echo "<br/>选择数据库成功"."<br/>";
} else{
echo "<br/>选择数据库失败".mysql_error();
}
//设置mysql字符编码
mysql_query("set names utf8;");
//insert语句
$insert = "insert into estateinfo (id,coveredArea,insideArea ,location,price, time,housetype,owner) values ('$id','$coveredArea ','$insideArea ','$location','$price','$time','$housetype','$owner')";
$res_insert = mysql_query($insert);
if($res_insert){
    echo "<script>alert('插入成功')</script>";
 header( "refresh:1;url=./manager.php" );
} else {
   echo "<script>alert('插入失败')</script>";
 header( "refresh:1;url=./manager.php" );
 
}
?>
