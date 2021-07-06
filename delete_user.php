<?php 
include('includes/config.php');

$id = $_GET['id'];

if(deleteProduct($db, $id)){
    header('location:index.php');
}
function deleteProduct($db, $id){
    $statement = $db->prepare('DELETE FROM users WHERE id = :id');
    $statement->bindParam(':id', $id);
    return $statement->execute();
}

?>