<?php
// إظهار الأخطاء بوضوح لمعرفة سبب المشكلة
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = "sql112.infinityfree.com"; 
$user = "if0_43269103";             
$pass = "qw99L32VsIBCO";          
$dbname = "if0_43269103_soba_db";   

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo "فشل الاتصال بقاعدة البيانات: " . $conn->connect_error;
    exit();
}

echo "تم الاتصال بقاعدة البيانات بنجاح تام!";
?>