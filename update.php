<?php 
error_reporting(E_ALL ^ E_DEPRECATED);

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
mysql_query("set names utf8;");//设置mysql字符编码
$year = $_POST[ "year" ];
$month = $_POST[ "month" ];
$day = $_POST[ "day" ];
$id = $_POST[ "id" ];
 $location= $_POST[ "location" ];
$coveredArea = $_POST[ "coveredArea" ];
$insideArea = $_POST[ "insideArea" ];
$price= $_POST[ "price" ];
$housetype = $_POST[ "housetype" ];
$owner= $_POST[ "owner" ];
$time = $year . "-" . $month . "-" . $day;
if($location)
{
    $res_update1=mysql_query("update estateinfo set  location='$location' where id='$id'");
}
if($coveredArea)
{
    $res_update2=mysql_query("update estateinfo set  coveredArea='$coveredArea' where id='$id'");
}
if($insideArea)
{
    $res_update3=mysql_query("update estateinfo set  insideArea='$insideArea' where id='$id'");
}
if($price)
{
    $res_update4=mysql_query("update estateinfo set  price='$price' where id='$id'");
}
if($housetype )
{
    $res_update5=mysql_query("update estateinfo set  housetype='$housetype' where id='$id'");
}
if($owner)
{
    $res_update6=mysql_query("update estateinfo set  owner='$owner' where id='$id'");

}
if($time)
{
    $res_update7=mysql_query("update estateinfo set  time='$time' where id='$id'");
} 
 if($res_update1||$res_update2||$res_update3||$res_update4||$res_update5||$res_update6||$res_update7){
 echo "<script>alert('更新成功')</script>";
 header( "refresh:1;url=./manager.php" );
} else {
   echo "<script>alert('更新失败')</script>";
 header( "refresh:1;url=./manager.php" );
}
?>
