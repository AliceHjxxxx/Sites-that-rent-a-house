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
//设置mysql字符编码
mysql_query("set names utf8;");
$id = $_GET["id"];  

$delete= "delete from estateinfo where id={$id}";    
$res_delete = mysql_query($delete);
if($res_delete){
    echo "<script>alert('删除成功')</script>";
 header( "refresh:1;url=./manager.php" );
} else {
   echo "<script>alert('删除失败')</script>";
 header( "refresh:1;url=./manager.php" );
 
}
?>
