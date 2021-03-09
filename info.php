<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

  <link rel="stylesheet" href="css/info.css">
</head>
</head>
<body>
    <div>
        <h1>关于此房</h1>
        <a href="#">联系我们</a>&nbsp&nbsp&nbsp&nbsp<a href="#">页面设置</a></div>
        ————————————————————————————————————————————————————————————————————————————————————————————    
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

         <a href="info.php">   <div class="apartment">
                <div class="pic" style="background-image: url(<?php echo(" img/".$value["id"].".jpg ")?>)">
                    <h5 class="selling" style='<?php if($value["owner"]=="") {echo("display: none;");} ?>'>已售</h5>
                </div>
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

      <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="js/info.js"></script>  
</body>
</html>