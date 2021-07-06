<?php 
include('includes/config.php');
include('read_product.php');

$title = $description = $price ='';
$title_error = $description_error = $price_error = '';

if(isset($_POST['submitproduct'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $id = $_GET['id'];

    if(empty($title)){
        $title_error = 'Voer een titel in!';
    } else {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $title)){
            $title_error = 'Voer een geldige titel in!';
        }
    }

    if (!preg_match("/^[a-zA-Z0-9]*$/", $description)){
        $description_error = 'Voer een geldige description in!';
    }

    if(empty($price)){
        $price_error = 'Voer een prijs in!';
    } else {
        if (!preg_match("/^[0-9\.\,]+$/", $price)){
            $price_error = 'Voer een geldige getal in op 2 decimale na de punt!';
        }
    }

    if(empty($title_error) && empty($description_error) && empty($price_error)){
        if(!is_dir('images')){
            mkdir('images');
        }
    
        $image = $_FILES['image'] ?? null;
        if ($image['image']){
            unlink($image['image']);
        }
    
    
        if ($image && $image['tmp_name']){
            $image_path = '';
            $image_path = 'images/'. randomStringGenerator(8).'/'.$image['name'];
            mkdir(dirname($image_path));
            move_uploaded_file($image['tmp_name'], $image_path);
        }
    
        if (saveInfo($db, $title, $image_path, $description, $price, $id)){
            header('location:index.php');
        }
    }
}

function randomStringGenerator($n){
    $characters  = 'abcdefghjklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $str = '';
    for($i = 0; $i < $n; $i++){
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }
    return $str;
}

function saveInfo($db, $title, $image_path, $description, $price, $id){
    $statement = $db->prepare("UPDATE users SET title = :title, image = :image, description = :description, price = :price WHERE id = :id");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':image', $image_path);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':id', $id);

    return $statement->execute();
}
?>