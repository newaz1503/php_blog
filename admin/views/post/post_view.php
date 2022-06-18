<?php
$posts = $blog->view_post();

if (isset($_GET['status'])){
    if ($_GET['status'] == 'delete'){
        $id = $_GET['id'];
        $message = $blog->delete_post($id);
    }
}

?>

<div class="container">
    <div class="d-flex justify-content-between py-4">
        <h3>Post List</h3>
        <a href="post_create.php" class="btn btn-primary">Add New Post</a>
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
                    <th width="10%">Category Name</th>
                    <th width="40%">Title</th>
                    <th width="15%">Image</th>
                    <th width="10%">Status</th>
                    <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $key=>$post){  ?>
                    <tr>
                        <td><?php echo $key + 1 ?> </td>
                        <td><?php echo $post['name'] ?></td>
                        <td><?php echo $post['title'] ?></td>
                        <td>
                            <img src="uploads/post/<?php echo $post['image'] ?>"  alt="<?php echo $post['title'] ?>" width="80" height="60"
                            > <br/>
                            <a href="edit_image.php?status=image_edit&&id=<?php echo $post['id'] ?>" class=""><small>Change image</small>  </a>
                        </td>
                        <td>
                            <?php
                                if ($post['status'] == 1){
                                    echo "<p class='btn btn-success btn-sm'>Published</p>";
                                }else{
                                    echo "<p class='btn btn-danger btn-sm'>UnPublished</p> ";
                                }
                            ?>
                        </td>
                        <td>
                            <a href="post_edit.php?status=post_edit&&id=<?php echo $post['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="?status=delete&&id=<?php echo $post['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php }  ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
