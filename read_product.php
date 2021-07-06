<?php 

$id = empty($_GET["id"]) ? null : $_GET["id"];
$sql = "SELECT * FROM users WHERE id=:id";

$params = array(
    ":id" => $id
);

try {
    $sth = $db->prepare($sql);
    $sth->execute($params);
    
    $products = $sth->fetch(PDO::FETCH_ASSOC);
} 
catch (PDOException $e) {
    echo $e->getMessage();
}
?>