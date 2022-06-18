<?php

if (isset($_POST['add_category'])){
    $message = $blog->add_category($_POST);
}


?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Category</h3></div>
                <?php if (isset($message)){
                    echo "<p style='background-color: red; color: #fff; padding: 0 10px'>$message</p>";
                }
                ?>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Category Name</label>
                            <input class="form-control py-4" name="name" id="inputEmailAddress" type="text" placeholder="Category Name" />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Description</label>
                            <textarea rows="5" class="form-control py-2" name="description" id="inputEmailAddress" placeholder="Category Description"></textarea>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-betw">
                            <button type="submit" class="btn btn-primary" name="add_category">Submit</button>
                            <a href="category_view.php" class="btn btn-danger ml-1">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>