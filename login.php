<?php
$DSN = "mysql:host=localhost; dbname=eirs";
$DB = new PDO( $DSN, 'root', '', array( PDO::ATTR_PERSISTENT => true ) );
$DB->query( 'set names utf8' );

$tel = $_POST[ "phnum" ];
$psw = $_POST[ "psd" ];
$type = $_POST[ "type" ];

$query = 'SELECT * FROM user WHERE tel = ' . $tel;
$result = $DB->query( $query );
$DB = null;
if ( $result->rowCount() > 0 ) {
    $result->setFetchMode( PDO::FETCH_ASSOC );
    $user = $result->fetch();
    if ( $user[ "psw" ] != $psw ) {
        echo "<script>alert('密码错误！');window.location.href = 'index.php';</script>";
        exit();
    } else {
        if ( $user[ "isAdministrator" ] == $type ) {
            session_start();
            $_SESSION[ "tel" ] = $tel;
            if ( $type === "0" ) {
                header( "Location:profile.php" );
            } else {
                header( "Location:manager.php" );
            }
        } else {
            if ( $type == "1" ) {
                echo "<script>alert('该账号不是管理员！');window.location.href = 'index.php';</script>";
                exit();
            } else {
                echo "<script>alert('该账号不是用户！');window.location.href = 'index.php';</script>";
                exit();
            }
        }
    }
} else {
    echo "<script>alert('账号不存在!');window.location.href = 'index.php';</script>";
    exit();
}
?>