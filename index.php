<?php require_once 'show_user.php'?>
<?php include 'includes/header.php'?>
<main>
    <h1>Product CRUD</h1>
    <a href="create_form.php" class="btn btn-success">Create</a>
    <form class="input-group mb-3">
        <div class="input-group-prepend">
            <button class="btn btn-outline-secondary" type="button">Search</button>
        </div>
        <input type="text" class="form-control" name="search" value="<?php echo $search ?>">
    </form>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">image</th>
                <th scope="col">title</th>
                <th scope="col">price</th>
                <th scope="col">create_date</th>
                <th scope="col">create_date</th>
            </tr>
        </thead>
        <tbody> 
            <?php foreach($product as $row){ ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><img src="<?php echo $row["image"]; ?>" style='width:200px;'></td>
                    <td><?php echo $row["title"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["create_date"]; ?></td>
                    <td>
                        <a href="edit_form.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-primary">EDIT</a>
                        <a href="delete_user.php?id=<?php echo $row["id"]; ?>" class="btn btn-outline-danger">DELETE</a>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</main>
<?php include 'includes/footer.php'?>