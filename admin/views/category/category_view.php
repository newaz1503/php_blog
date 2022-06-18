<?php
    $categories = $blog->view_category();

    if (isset($_GET['status'])){
        if ($_GET['status'] == 'delete'){
            $id = $_GET['id'];
            $message = $blog->delete_category($id);
        }
    }

?>

<div class="container">
    <div class="d-flex justify-content-between py-4">
        <h3>Category List</h3>
        <a href="category_create.php" class="btn btn-primary">Add Category</a>
    </div>
    <?php
        if (isset($message)){
            echo $message;
        }

    ?>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th width="10%">Serial No</th>
                    <th width="20%">Category Name</th>
                    <th width="50%">Category Description</th>
                    <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $key=>$category){  ?>
                    <tr>
                        <td><?php echo $key + 1 ?> </td>
                        <td><?php echo $category['name'] ?></td>
                        <td><?php echo $category['description'] ?></td>
                        <td>
                            <a href="category_edit.php?status=edit&&id=<?php echo $category['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="?status=delete&&id=<?php echo $category['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php }  ?>
                </tbody>
            </table>

        </div>
    </div>
</div>