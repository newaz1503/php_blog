<?php
    $categories = $blog->view_category();
    if(isset($_POST['add_post'])){
        $message = $blog->add_post($_POST);
    }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg my-3">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create New Post</h3></div>
                <?php if (isset($message)){
                    echo "<p style='background-color: red; color: #fff; padding: 0 10px'>$message</p>";
                }
                ?>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Select Category</label>
                            <select name="category_id" class="form-control">
                                <option value="" selected disabled>Select Category</option>
                                <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Post Title</label>
                            <input class="form-control py-4" name="title" id="inputEmailAddress" type="text" placeholder="Post title" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Post Description</label>
                            <textarea rows="5" class="form-control py-2" name="description" id="inputEmailAddress" placeholder="Post Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Post Tag</label>
                            <input class="form-control py-4" name="tag" id="inputEmailAddress" type="text" placeholder="Post Tag" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Publish Status</label>
                            <select name="status" class="form-control">
                                <option value="" selected disabled>Select Status</option>
                                <option value="1">Publish</option>
                                <option value="0">UnPublish</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Post Image</label>
                            <input class="form-control py-1" name="image" id="inputEmailAddress" type="file" />
                        </div>
                        <div class="form-group d-flex align-items-center pt-2">
                            <button type="submit" class="btn btn-primary" name="add_post">Publish</button>
                            <a href="post_view.php" class="btn btn-danger ml-1">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
