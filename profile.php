<?php
session_start();
if ( !isset( $_SESSION[ "tel" ] ) ) {
    header( 'Location:index.php' );
}

$DSN = "mysql:host=localhost; dbname=eirs";
$DB = new PDO( $DSN, 'root', '', array( PDO::ATTR_PERSISTENT => true ) );
$DB->query( 'set names utf8' );

$tel = $_SESSION[ "tel" ];

$query = 'SELECT * FROM user WHERE tel = ' . $tel;
$result = $DB->query( $query );
$DB = null;

$result->setFetchMode( PDO::FETCH_ASSOC );
$user = $result->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/user.css">
</head>

<body>
    <div id="left">
        <div id="leftTop" style="background-image: url(
                                 <?php 
                                 if($user[ "gender" ]=="1") {
                                     echo "img/male.jpg " ;
                                 } else {
                                     echo "img/female.jpg " ;
                                 }
                                 ?>
                                 )"></div>
        <h5 id="profileName">
            <?php echo $user["name"]?>
        </h5>
        <div class="info">
            <p class="formTitle">身份证号：</p>
            <p class="formVal">
                <?php echo $user["IDCardNums"]?>
            </p>
            <p class="formTitle">出生日期：</p>
            <p class="formVal">
                <?php echo $user["birthday"]?>
            </p>
            <p class="formTitle">邮箱：</p>
            <p class="formVal">
                <?php echo $user["email"]?>
            </p>
            <p class="formTitle">地址：</p>
            <p class="formVal">
                <?php echo $user["address"]?>
            </p>
            <p class="formTitle">手机号：</p>
            <p class="formVal">
                <?php echo $user["tel"]?>
            </p>
        </div>
    </div>
    <div id="right">
        <div id="rightTop">
            <input type="text" placeholder="请输入城市！" id="addrInput">
            <i id="searchBtn" class="fa fa-search fa-3x pointer"></i>
        </div>
        <div id="rightBtm">
            <?php 
                $DSN = "mysql:host=localhost; dbname=eirs";
                $DB = new PDO( $DSN, 'root', '', array( PDO::ATTR_PERSISTENT => true ) );
                $DB->query( 'set names utf8' );
            
                $query = 'SELECT * FROM estateinfo';
                $result = $DB->query( $query );
                $DB = null;
                $result->setFetchMode( PDO::FETCH_ASSOC );
                $estateinfo = $result->fetchAll();
                
                foreach($estateinfo as $value){ ?>
           <div class="apartment">
                <a href="info"><div class="pic" style="background-image: url(<?php echo(" img/".$value["id"].".jpg ")?>)">
                    <h5 class="selling" style='<?php if($value["owner"]=="") {echo("display: none;");} ?>'>已售</h5>
                </div></a>
                <div class="info">
                    <p class="formTitle">建筑面积：</p>
                    <p class="formVal"><?php echo($value["coveredArea"])?>平米
                    </p>
                    <p class="formTitle">套内面积：</p>
                    <p class="formVal"><?php echo($value["insideArea"])?>平米
                    </p>
                    <p class="formTitle">户型：</p>
                    <p class="formVal"><?php echo($value["housetype"])?></p>
                    <p class="formTitle">地址：</p>
                    <p class="formVal"><?php echo($value["location"])?></p>
                    <p class="formTitle">售价：</p>
                    <p class="formVal">￥<?php echo($value["price"])?>万
                    </p>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/profile.js"></script>
</body>
</html>