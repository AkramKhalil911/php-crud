<?php include('includes/header.php')?>
<?php include 'edit_product.php'?>
<?php 
$title = "";
$description = "";
$price = "";
$image = "";

if (!empty($products)) {$title = $products["title"];}
if (!empty($products)) {$description = $products["description"];}
if (!empty($products)) {$price = $products["price"];}
if (!empty($products)) {$image = $products["image"];}
?>
    <main>
        <h1>edit product</h1>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="image">Product Image</label><br>
                <input type="file" id="file" name="image" placeholder="Voer product in">
                <img src="<?php echo $image ?>" style="width:500px;">
            </div>
            <div class="form-group">
                <label for="title">Product Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Voer product in" value="<?php echo $title ?>">
                <span class="error" role="alert"><?php echo $title_error ?></span>
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea class="form-control" name="description" id="description" placeholder="Voer description in"><?php echo $description ?></textarea>
                <span class="error" role="alert"><?php echo $description_error ?></span>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step='.01' name="price" class="form-control" id="price" placeholder="Voer prijs in" value="<?php echo $price ?>">
                <span class="error" role="alert"><?php echo $price_error ?></span>
            </div>
            <button type="submit" id="submitproduct" name="submitproduct" class="btn btn-success">Submit</button>
        </form>
        <a href='index.php' class="btn btn-dark">Ga terug</a>
    </main>
<?php include 'includes/footer.php'?>