

<?php
// $db_HOST = 'localhost';
// $db_USER = 'id14771888_poonamkurmi2';
// $db_PASSWORD = 'uD-\TxDaKg$Z9GYL';
// $db_DATABASE = 'id14771888_voting';


$db_HOST = 'localhost';
$db_USER = 'root';
$db_PASSWORD = '';
$db_DATABASE = 'registration';


$conn = mysqli_connect($db_HOST, $db_USER, $db_PASSWORD, $db_DATABASE);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
