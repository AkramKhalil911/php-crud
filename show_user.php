<?php 
include('includes/config.php');

$search = $_GET['search'] ?? '';

if ($search){
    $statement = $db->prepare('SELECT * FROM users WHERE title LIKE :title ORDER BY id');
    $statement->bindValue(':title', "%$search%");
} else {
    $statement = $db->prepare('SELECT * FROM users');
}

$statement->execute();
$product = $statement->fetchAll(PDO::FETCH_ASSOC);

?>