<?php
$DSN = "mysql:host=localhost; dbname=eirs";
$DB = new PDO( $DSN, 'root', '', array( PDO::ATTR_PERSISTENT => true ) );
$DB->query( 'set names utf8' );

$year = $_POST[ "year" ];
$month = $_POST[ "month" ];
$day = $_POST[ "day" ];

$name = $_POST[ "name" ];
$idNum = $_POST[ "idNum" ];
$birthday = $year . "-" . $month . "-" . $day;
$gender = $_POST[ "gender" ];
$email = $_POST[ "email" ];
$addr = $_POST[ "addr" ];
$tel = $_POST[ "tel" ];
$psd = $_POST[ "psd" ];

$insert = "INSERT INTO `user`(`name`, `IDCardNums`, `birthday`, `gender`, `email`, `address`, `tel`, `psw`, `isAdministrator`) VALUES ('" . $name . "', '" . $idNum . "', '" . $birthday . "', b'" . $gender . "', '" . $email . "', '" . $addr . "', '" . $tel . "', '" . $psd . "', b'0')";

$affected = $DB->exec( $insert );
$DB = null;
if ( $affected > 0 ) {
    session_start();
    $_SESSION[ "tel" ] = $tel;
    header( "Location:profile.php" );
}
?>