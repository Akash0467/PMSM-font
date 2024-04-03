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

 function dataRowCount($tbl,$col,$val){
    global $pdo;

    $stm=$pdo->prepare("SELECT $col FROM $tbl WHERE $col=?");
    $stm->execute(array($val));
    $res=$stm->rowCount();
    return $res;
 }

function Student($col,$id){
    global $pdo;
    $stm=$pdo->prepare("SELECT $col FROM student WHERE id=?");
    $stm->execute(array($id));
    $result =$stm->fetchAll(PDO::FETCH_ASSOC);
    return $result[0][$col];
}


