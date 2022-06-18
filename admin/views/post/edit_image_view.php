
<?php

    if (isset($_GET['status'])){
        if (isset($_GET['status']) == 'image_edit'){
            $id = $_GET['id'];
        }
    }


    if (isset($_POST['update_image'])){
        $message = $blog->update_image($_POST);
    }


?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg my-3">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit your Post image</h3></div>
                <?php if (isset($message)){
                    echo "<p style='background-color: red; color: #fff; padding: 0 10px'>$message</p>";
                }
                ?>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Upload Image</label>
                            <input class="form-control py-1" name="post_image" id="inputEmailAddress" type="file" required />
                        </div>
                        <input type="hidden" name="post_image_id" value="<?php echo $id ?>">
                        <div class="form-group d-flex align-items-center pt-2">
                            <button type="submit" class="btn btn-primary" name="update_image">Change</button>
                            <a href="post_view.php" class="btn btn-danger ml-1">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
