<?php
    include("admin/code.php");
    $blog = new BlogCode();
    $categories = $blog->view_category();
?>


<?php include_once('includes/header.php') ?>

<!-- Page Content -->

<?php include_once('includes/banner.php') ?>

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <!--Blog post-->
            <?php include_once('includes/blog.php') ?>
        </div>
    </div>
</section>


<?php include_once('includes/footer.php') ?>
