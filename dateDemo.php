<?php
include 'model.php'; 
//date_default_timezone_set( 'America/Phoenix' );
//$mydate = date ( "d-M-Y" );
//echo $mydate;
$user = "Jiaming";
$arr = $theDBA->check($user);

echo $arr[0]['Admin'];
if($arr[0]['Admin'] == 1)
    echo "It is one!";
if($arr[0]['Admin'] === null)
    echo "It is null!";
?>