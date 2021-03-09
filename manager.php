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
    <title>Manager</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/basic.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/manager.css">
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
            <div id="userInfo" class="pointer">
                <i class="fa fa-check-square-o"></i> 客户信息
            </div>
            <div id="apartmentInfo" class="pointer">
                <i class="fa fa-square-o"></i> 房产信息操作
            </div>
        </div>
        <div id="rightBtm">
            <div id="userTab">
                <table>
                    <thead>
                        <tr>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>身份证号</th>
                            <th>出生日期</th>
                            <th>邮箱</th>
                            <th>地址</th>
                            <th>电话</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $DSN = "mysql:host=localhost; dbname=eirs";
                            $DB = new PDO( $DSN, 'root', '', array( PDO::ATTR_PERSISTENT => true ) );
                            $DB->query( 'set names utf8' );
                            
                            $tel = $_SESSION[ "tel" ];
                            
                            $query = 'SELECT * FROM user WHERE isAdministrator = 0;';
                            $result = $DB->query( $query );
                            $DB = null;
                            
                            $result->setFetchMode( PDO::FETCH_ASSOC );
                            $user = $result->fetchAll();
            
                            foreach($user as $value){
                        ?>
                        <tr>
                            <td data-label="姓名"><?php echo $value["name"]?></td>
                            <td data-label="性别"><?php if($value["gender"]=="1"){echo("男");}else{echo("女");}?></td>
                            <td data-label="身份证号"><?php echo $value["IDCardNums"]?></td>
                            <td data-label="出生日期"><?php echo $value["birthday"]?></td>
                            <td data-label="邮箱"><?php echo $value["email"]?></td>
                            <td data-label="地址"><?php echo $value["address"]?></td>
                            <td data-label="电话"><?php echo $value["tel"]?></td>
                        </tr>
                            <?php }?>
                     
                        
                    </tbody>
                </table>
            </div>
            <div id="apartmentTab">
                <table>
                    <thead>
                        <tr>
                            <th>序号</th>
                            <th>地址</th>
                            <th>建筑面积</th>
                            <th>套内面积</th>
                            <th>售价</th>
                            <th>户型</th>
                            <th>购买时间</th>
                            <th>户主</th>
                              <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
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
                        <tr>
                             <td data-label="序号"  ><?php echo $value["id"]?></td>
                            <td data-label="地址"><?php echo $value["location"]?></td>
                            <td data-label="建筑面积"><?php echo $value["coveredArea"]?>平米</td>
                            <td data-label="套内面积"><?php echo $value["insideArea"]?>平米</td>
                            <td data-label="售价">￥<?php echo $value["price"]?>万</td>
                            <td data-label="户型"><?php echo $value["housetype"]?></td>
                            <td data-label="购买时间"><?php echo $value["time"]?></td>
                            <td data-label="户主"><?php echo $value["owner"]?></td>
                            <td><a href="delete.php?id=<?=$value['id']?>">删除</a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <br><br>
                <br> <h2 >▶房屋信息发布</h2></br>
                  <div >
                    <form class="form"  action="insert.php" method="post" onSubmit="return inputCheck()">
                            <table>
               <tr><td>
            <label for="id"  class="b">序号:</label></td>
            <td>   <input type="text" name="id" id="id"  class="three"/></td>

        <tr><td>  <label for="coveredArea" class="b" >建筑面积：</label></td>
           <td><input type="text" name="coveredArea" id="coveredArea" class="three"/></td> 
       </tr>
 <tr><td>
            <label for="insideArea" >套内面积:</label></td>
         <td>  <input type="text" name="insideArea" id="insideArea" class="three"/></td> 
        </tr>     
        <tr><td>
            <label for="housetype"  >户型:</label></td>
       <td>   <input type="text" name="housetype" id="housetype" class="three" /></td>  
       </tr>
         <tr><td>
            <label for="location"  class="b">地址:</label></td>
            <td>   <input type="text" name="location" id="location"  class="three"/></td>
        </tr>
        <tr><td>
            <label for="price">售价：</label></td>
        <td>   <input type="text" name="price" id="price" class="three"/></td> 
    </tr>
    <td><label for="time"  >购买时间</label></td>
            <td>  <input type="text" class="date" name="year"  placeholder="年">年
                    <input type="text" class="date" name="month" placeholder="月">月
                    <input type="text" class="date" name="day" placeholder="日">日</td>
        </tr>
    <tr><td>
            <label for="owner"  >户主:</label></td>
       <td>   <input type="text" name="owner" id="owner" class="three" /></td>  
       </tr>
        </table>
        <p>
       <button type="submit" id="reg-b">提&nbsp;&nbsp;&nbsp;交</button>&nbsp&nbsp&nbsp&nbsp
       <button type="reset" id="reset-b">重&nbsp;&nbsp;&nbsp;置</button></p>
 </form>
            </div> 
        </br></br>
        <br><h2 >▶房屋信息更新</h2>
                  <div >
                    <form class="form"  action="update.php" method="post" onSubmit="return inputCheck()"></br>
                            <table>
               <tr><td>
    <label for="id"  class="b">请输入要更新房屋的序号:</label></td>
            <td>   <input type="text" name="id" id="id"  class="three"/></td>
        </tr></table>
        <br><h2 >请任选您要更新的房屋信息填写</h2></br>
        <table >
        <tr><td>  <label for="coveredArea" class="b" >建筑面积：</label></td>
           <td><input type="text" name="coveredArea" id="coveredArea" class="three"/></td> 
       </tr>
 <tr><td>
            <label for="insideArea" >套内面积:</label></td>
         <td>  <input type="text" name="insideArea" id="insideArea" class="three"/></td> 
        </tr>     
        <tr><td>
            <label for="housetype"  >户型:</label></td>
       <td>   <input type="text" name="housetype" id="housetype" class="three" /></td>  
       </tr>
         <tr><td>
            <label for="location"  class="b">地址:</label></td>
            <td>   <input type="text" name="location" id="location"  class="three"/></td>
        </tr>
        <tr><td>
            <label for="price">售价：</label></td>
        <td>   <input type="text" name="price" id="price" class="three"/></td> 
    </tr>
    <td><label for="time"  >购买时间</label></td>
            <td>  <input type="text" class="date" name="year"  placeholder="年">年
                    <input type="text" class="date" name="month" placeholder="月">月
                    <input type="text" class="date" name="day" placeholder="日">日</td>
        </tr>
    <tr><td>
            <label for="owner"  >户主:</label></td>
       <td>   <input type="text" name="owner" id="owner" class="three" /></td>  
       </tr>
        </table>
        <p>
       <button type="submit" id="reg-b">提&nbsp;&nbsp;&nbsp;交</button>&nbsp&nbsp&nbsp&nbsp
       <button type="reset" id="reset-b">重&nbsp;&nbsp;&nbsp;置</button></p>
 </form>
            </div> 
        </div>
    </div>
</body>
    <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
        <script type="text/javascript"  src="js/manager.js"> </script>
</html>