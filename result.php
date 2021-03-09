<?php
$addr = $_POST["addr"];
$DSN = "mysql:host=localhost; dbname=eirs";
$DB = new PDO( $DSN, 'root', '', array( PDO::ATTR_PERSISTENT => true ) );
$DB->query( 'set names utf8' );
$query = 'SELECT * FROM `estateinfo`WHERE location = "'.$addr.'";';
$result = $DB->query( $query );
$DB = null;
$result->setFetchMode( PDO::FETCH_ASSOC );
$estateinfo = $result->fetchAll();
foreach ( $estateinfo as $value ) {
    ?>
    <div class="apartment">
        <div class="pic" style="background-image: url(<?php echo(" img/".$value["id"].".jpg")?>)">
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