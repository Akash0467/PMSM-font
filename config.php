<?php 
$host = "localhost";
$db_name = "psms";
$user = "root";
$password = "";

try{
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
}
catch(PDOException $m){
    echo "Connection failed: " . $m->getMessage();
}
// Count any columm valu form students table

// function stRowCount($tbl, $col, $val){
//     global $pdo;
//     $stm=$pdo->prepare("SELECT $col FROM $tbl WHERE $col=? ");
//     $stm->execute(array($val));
//     $count = $stm->rowCount();
//     return $count;
// }

// function sRowCount($col, $val){
//     global $pdk;
//     $stm = $pdk->prepare("SELECT $col FORM student WHERE $col=?");
//     $stm->execute(array($val));
//     $count = $stm->RowCount();
//     return $count;
// }
 function DataRowCount($tbl,$col,$val){
    global $pdo;

    $stm=$pdo->prepare("SELECT $col FROM $tbl WHERE $col=?");
    $stm->execute(array($val));
    $res=$stm->rowCount();
    return $res;
 }