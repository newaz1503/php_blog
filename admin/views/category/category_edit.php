
<?php

    if (isset($_GET['status'])){
        if ($_GET['status'] == 'edit'){
            $id = $_GET['id'];
            $category = $blog->edit_category($id);
        }
    }


    if (isset($_POST['update_category'])){
        $message = $blog->update_category($_POST);
    }


?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Category</h3></div>
                <?php if (isset($message)){
                    echo "<p style='background-color: red; color: #fff; padding: 0 10px'>$message</p>";
                }
                ?>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Category Name</label>
                            <input class="form-control py-4" name="name" id="inputEmailAddress" type="text" value="<?php echo $category['name'] ?>" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Description</label>
                            <textarea class="form-control py-2" name="description" id="inputEmailAddress"rows="5" ><?php echo $category['description'] ?></textarea>
                        </div>
                        <input type="hidden" class="form-control" name="category_id" value="<?php echo $category['id'] ?>" >
                        <div class="form-group d-flex align-items-center justify-content-betw">
                            <button type="submit" class="btn btn-primary" name="update_category">Update</button>
                            <a href="category_view.php" class="btn btn-danger ml-1">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>